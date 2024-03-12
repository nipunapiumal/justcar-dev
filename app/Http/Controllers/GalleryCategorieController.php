<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->current_store;

        $gallery_categorys = GalleryCategorie::where('store_id', $user)->where('created_by', Auth::user()->creatorId())->get();

        return view('gallery_category.index', compact('gallery_categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro_cat = GalleryCategorie::where('name', $request->name)->where('store_id', Auth::user()->current_store)->first();
        if (!empty($pro_cat)) {
            return redirect()->back()->with('error', __('Gallery Category Already Exist!'));
        }
        $this->validate(
            $request,
            [
                'name' => 'required|max:40',
                'categorie_img' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
            ]
        );

        if (!empty($request->categorie_img)) {
            $filenameWithExt  = $request->file('categorie_img')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('categorie_img')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/gallery_image/');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $img = \Image::make($request->file('categorie_img'));
            if ($img->width() >= 1280) {
                $img->fit(1280, 720);
            }

            $img->save($dir . $fileNameToStores, 90);
            // $path = $request->file('categorie_img')->storeAs('uploads/gallery_image/', $fileNameToStores);
        }

        $galleryCategorie             = new GalleryCategorie();
        $galleryCategorie['store_id'] = Auth::user()->current_store;
        $galleryCategorie['name']     = $request->name;
        if (!empty($fileNameToStores)) {
            $galleryCategorie['categorie_img'] = $fileNameToStores;
        }
        $galleryCategorie['created_by'] = Auth::user()->creatorId();
        $galleryCategorie->save();

        return redirect()->back()->with('success', __('Gallery Category added!'));
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
    public function edit(GalleryCategorie $galleryCategorie)
    {
        return view('gallery_category.edit', compact('galleryCategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryCategorie $galleryCategorie)
    {
        $pro_cat = GalleryCategorie::where('name', $request->name)->where('store_id', Auth::user()->current_store)->first();

        $this->validate(
            $request,
            [
                'name' => 'required|max:40',
                'categorie_img' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
            ]
        );

        if (!empty($request->categorie_img)) {
            if (!empty($pro_cat->categorie_img)) {
                if (asset(Storage::exists('uploads/gallery_image/' . $pro_cat->categorie_img))) {
                    asset(Storage::delete('uploads/gallery_image/' . $pro_cat->categorie_img));
                }
            }

            $filenameWithExt  = $request->file('categorie_img')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('categorie_img')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/gallery_image/');
            if (asset(Storage::exists('uploads/gallery_image/' . ($galleryCategorie['categorie_img'])))) {
                asset(Storage::delete('uploads/gallery_image/' . $galleryCategorie['categorie_img']));
            }

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $img = \Image::make($request->file('categorie_img'));
            if ($img->width() >= 1280) {
                $img->fit(1280, 720);
            }

            $img->save($dir . $fileNameToStores, 90);

            // $path = $request->file('categorie_img')->storeAs('uploads/gallery_image/', $fileNameToStores);
        }


        $galleryCategorie['name'] = $request->name;
        if (!empty($fileNameToStores)) {
            $galleryCategorie['categorie_img'] = $fileNameToStores;
        }
        $galleryCategorie['created_by'] = \Auth::user()->creatorId();
        $galleryCategorie->update();

        return redirect()->back()->with('success', __('Gallery Category updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryCategorie $galleryCategorie)
    {
        $product = Gallery::where('gallery_categorie', $galleryCategorie->id)->get();

        if ($product->count() != 0) {
            return redirect()->back()->with(
                'error',
                __('Category is used in gallery!')
            );
        } else {
            $galleryCategorie->delete();

            return redirect()->back()->with(
                'success',
                __('Gallery Category has been deleted!')
            );
        }
    }
}
