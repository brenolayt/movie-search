<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class mainController extends Controller
{
    public function show(){
        $response = http::get('http://www.omdbapi.com/', [
            'apikey' => env('MOVIE_API_KEY'),
            's' => 'batman',
        ]);
        if($response->failed()){
            return back()->with('error', 'API request failed');
        }

        $movies = $response->json();
        
        if(empty($movies)){
            return back()->with('error', 'No movies found');
        }

        return view('home', [
            'movies' => $movies
        ]);
    }

    public function details($id){
        $response = http::get('http://www.omdbapi.com/', [
            'apikey' => env('MOVIE_API_KEY'),
            'i' => $id
        ]);

        if($response->failed()){
            return back()->with('error', 'API request failed');
        }

        return view('view-more', [
            'movie' => $response->json(),
        ]);
    }

    public function search(Request $request){
        $response = http::get('http://www.omdbapi.com/', [
            'apikey' => env('MOVIE_API_KEY'),
            's' => $request->validate([
                'title' => ['required'],
            ])['title'],
        ]);

        if($response->failed()){
            return back()->with('error', 'API request failed');
        }

        return view('home', [
            'movies' => $response->json(),
        ]);
    }
}
