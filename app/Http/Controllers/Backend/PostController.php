<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PostStoreRequest;
use App\Http\Requests\Backend\PostUpdateRequest;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function json(Request $request)
    {
        $response = [
            'total' => 10,
            'rows' => []
        ];


        $query = Post::with('postcategory')->where([
            ['title', 'LIKE', '%'. $request->search .'%'],
            ['slug', 'LIKE', '%'. $request->search .'%'],
        ])->orderBy($request->has('sort') ? $request->sort : 'created_at', $request->has('order') ? $request->order : 'desc');

        $response['total'] = $query->count();
        $response['rows'] = $query->offset($request->offset)->limit($request->limit)->get();

        return response()->json($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postcategories = PostCategory::all();
        return view('backend.post.create', compact('postcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $form_data = [
            'title'           => $request->get('title'),
            'slug'            => $request->get('slug'),
            'content'         => $request->get('content'),
            'status'          => $request->get('status'),
            'postcategory_id' => $request->get('postcategory_id'),
            'author_id'       => $request->get('author_id'),
        ];

        if($request->hasFile('featured_image')){

            $file = $request->file('featured_image');
            $filename = 'featured_image-' . time() . '.' . $file->getClientOriginalExtension();
            $featured_image = $file->storeAs('public/featured_image', $filename);
            $featured_image = explode('/', $featured_image);
            array_shift($featured_image); // remove "public/"
            $featured_image = implode('/', $featured_image);

            $form_data['featured_image'] = $featured_image; 
        }

        Post::create($form_data);
        return redirect()->route('backend.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $postcategories = PostCategory::all();
        return view('backend.post.edit', compact('post', 'postcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        // $form_data = $request->except(['featured_image']);
        $form_data = [
            'title'           => $request->get('title'),
            'slug'            => $request->get('slug'),
            'content'         => $request->get('content'),
            'status'          => $request->get('status'),
            'postcategory_id' => $request->get('postcategory_id'),
            'author_id'       => $request->get('author_id'),
        ];

        // dd($form_data);

        if($request->hasFile('featured_image')){

            $file = $request->file('featured_image');
            $filename = 'featured_image-' . time() . '.' . $file->getClientOriginalExtension();
            $featured_image = $file->storeAs('public/featured_image', $filename);
            $featured_image = explode('/', $featured_image);
            array_shift($featured_image); // remove "public/"
            $featured_image = implode('/', $featured_image);

            $form_data['featured_image'] = $featured_image; 
        }

        Post::find($id)->update($form_data);
        return redirect()->route('backend.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back();
    }
}
