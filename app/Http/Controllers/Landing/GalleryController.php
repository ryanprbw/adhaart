<?php

namespace App\Http\Controllers\Landing;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {

        // dd(request('search'));
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' .  $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('landing.galleries.more_galleries', [
            "title" => "All Galleries" . $title,
            "active" => "galleries",
            // "posts" => Post::all()
            "galleries" => Gallery::latest()->filter(request(['search', 'category', 'author']))->paginate(12)->withQueryString()
        ]);
    }

    public function show(Gallery $gallery)
    {
        return view('landing.galleries.detailgalleries', [
            "title" => "Detail Gallery",
            "active" => "galleries",
            "gallery" => $gallery
        ]);
    }
}
