<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatController extends Controller
{
    //
    public function getCatImage()
    {
        $cat = Http::get("https://api.thecatapi.com/v1/images/search");

        $catImg = $cat[0]['url'];

        if ($cat->successful()) {
            return view('welcome', compact('catImg'));
        } else {
            return view('welcome', ['error' => 'Could not catch a cat']);
        }
    }

    public function getMoreCatImage()
    {
        $cats = Http::get("https://api.thecatapi.com/v1/images/search?limit=10");
        $cat = Http::get("https://api.thecatapi.com/v1/images/search");
        $catImg = $cat[0]['url'];

        if ($cats->successful() && $cat->successful()) {
            $cats = $cats->json();
            $cat = $cat->json();
            return view('welcome', compact('cats', 'catImg'));
        } else {
            return view('welcome', ['error' => 'Could not catch a cat']);
        }
    }
}
