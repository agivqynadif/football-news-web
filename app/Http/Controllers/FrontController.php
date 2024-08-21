<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertisement;
use App\Models\League;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $leagues = League::all();

        $articles = ArticleNews::with(['league'])
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();

        $featured_articles = ArticleNews::with(['league'])
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $authors = Author::all();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            // ->take(1)
            ->first();

        $premier_league_articles = ArticleNews::whereHas('league', function ($query) {
            $query->where('name', 'Premier League');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        return view('front.index', compact('leagues', 'articles', 'authors', 'featured_articles', 'bannerads', 'premier_league_articles'));
    }
}
