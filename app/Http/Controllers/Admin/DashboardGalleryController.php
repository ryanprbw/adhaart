<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\ValidatedData;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galleries.index', [
            // 'galleries' =>  Gallery::where('user_id', auth()->user()->id)->get()
            "galleries" => Gallery::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('gallery-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'slug' => 'required|unique:galleries',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('public/gallery');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 20);
        $validatedData['body2'] = Str::limit(strip_tags($request->body), 999);

        Gallery::create($validatedData);
        return redirect('admin/galleries')->with('success', 'Gallery Berhasil Ditambahkan');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        if ($gallery->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('admin.galleries.show', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        if ($gallery->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('admin.galleries.edit', [
            'gallery' => $gallery,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ];

        if ($request->slug != $gallery->slug) {
            $rules['slug'] = 'required|unique:galleries';
        }



        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($gallery->image) {
                Storage::delete($gallery->image);
            }
            $validatedData['image'] = $request->file('image')->store('public/galleries');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 20);
        $validatedData['body2'] = Str::limit(strip_tags($request->body), 999);

        Gallery::where('id', $gallery->id)
            ->update($validatedData);
        return redirect('/admin/galleries')->with('success', 'Gallery Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::delete($gallery->image);
        }
        Gallery::destroy($gallery->id);
        return redirect('/admin/galleries')->with('success', 'Gallery Berhasil Dihapus');
    }

    // public  function checkSlug(Request $request) {
    //     $slug = SlugService::createSlug(Gallery::class, 'slug', $request->title);
    //     return response()->json(['slug' => $slug]);
    // }
}
