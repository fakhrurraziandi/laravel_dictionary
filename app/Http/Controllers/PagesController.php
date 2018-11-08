<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home()
    {
    	$words = Word::orderBy('hit', 'desc')->limit(20)->get();
    	return view('home', compact('words'));
    }

    public function words(Request $request)
    {
    	$words = Word::where('name', 'LIKE', $request->keyword .'%')->paginate(10);
    	return view('words', compact('request', 'words'));
    }

    public function word($slug)
    {
    	$words = Word::where('slug', $slug)->get();
    	return view('word', compact('words'));
    }

    


}
