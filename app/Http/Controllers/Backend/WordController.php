<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\WordStoreRequest;
use App\Http\Requests\Backend\WordUpdateRequest;
use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{

    public function json(Request $request)
    {
        $response = [
            'total' => 10,
            'rows' => []
        ];


        $query = Word::where([
            ['name', 'LIKE', '%'. $request->search .'%'],
            ['slug', 'LIKE', '%'. $request->search .'%'],
        ])->orderBy($request->has('sort') ? $request->sort : 'id', $request->has('order') ? $request->order : 'desc');

        $response['total'] = $query->count();
        $response['rows'] = $query->limit($request->limit)->offset($request->offset)->get();

        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.word.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.word.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordStoreRequest $request)
    {
        Word::create($request->all());
        return redirect()->route('backend.word.index');
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
        $word = Word::find($id);
        return view('backend.word.edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordUpdateRequest $request, $id)
    {
        Word::find($id)->update($request->all());
        return redirect()->route('backend.word.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Word::find($id)->delete();
        return redirect()->back();
    }
}
