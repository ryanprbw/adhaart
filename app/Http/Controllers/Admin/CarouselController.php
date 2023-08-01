<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        //get posts
        $carousel = Carousel::latest()->paginate(3);

        //render view with posts
        return view('admin.carousels.index', compact('carousel'));
    }
    // Membuat Photo Baru
    public function create()
    {
        return view('admin.carousels.create');
    }
    // Simpan
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/carousels', $image->hashName());

        //create post
        Carousel::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('admin.carousels.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // Edit

    public function edit(Carousel $carousel)
    {
        return view('admin.carousels.edit', compact('carousel'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Carousel $carousel)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpg,png,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/carousels/', $image->hashName());

            //delete old image
            Storage::delete('public/carousels/' . $carousel->image);

            //update post with new image
            $carousel->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        } else {

            //update post without image
            $carousel->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('admin.carousels.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // Delete
    public function destroy(Carousel $carousel)
    {
        //delete image
        Storage::delete('public/carousels/' . $carousel->image);

        //delete post
        $carousel->delete();

        //redirect to index
        return back()->with('success', 'Carousel deleted.');
    }
}
