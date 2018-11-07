<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$words = Word::orderBy('hit', 'desc')->limit(20)->get();
    	return view('home', compact('words'));
    }

    public function word($slug)
    {
    	$words = Word::where('slug', $slug)->get();
    	return view('word', compact('words'));
    }

    public function search(Request $request)
    {
    	$this->validate($request, [
    		'keyword' => 'required'
    	]);

    	$words = Word::where('name', 'LIKE', '%'. $request->get('keyword') .'%')->paginate(5);

    	return view('search', compact('request', 'words'));
    }


}
