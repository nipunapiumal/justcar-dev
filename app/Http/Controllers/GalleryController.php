<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategorie;
use App\Models\Plan;
use App\Models\Store;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user             = \Auth::user();
        $store_id         = Store::where('id', $user->current_store)->first();
        $galleries         = Gallery::where('store_id', $store_id->id)->orderBy('id', 'DESC')->get();
        // $gallerycategorie = GalleryCategorie::where('store_id', $store_id->id)->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $galleryCategories = GalleryCategorie::where('store_id', Auth::user()->current_store)->pluck('name', 'id');

        return view('gallery.create', compact('galleryCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user     = \Auth::user();
        $store_id = Store::where('id', $user->current_store)->first();

        $validator = \Validator::make(
            $request->all(),
            [
                'gallery_categorie' => 'required|max:120',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            $msg['flag'] = 'error';
            $msg['msg']  = $messages->first();

            return $msg;
        }

        $file_name = [];
        if (!empty($request->multiple_files) && count($request->multiple_files) > 0) {
            foreach ($request->multiple_files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // $file_name[]     = $fileNameToStore;
                $dir             = storage_path('uploads/gallery_image/');
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $img = \Image::make($file);
                if ($img->width() >= 1280) {
                    $img->fit(1280, 720);
                }

                $img->save($dir . $fileNameToStore, 90);
                $file_name[] = ["name" => $fileNameToStore, "size" => ($img->filesize() / 1048576)]; //MB
            }

            
        }


        if (Utility::getStorageUsage() >= $user->total_storage) {
            //available storage exceeded
            $msg['flag'] = 'error';
            $msg['msg']  = __('Your available storage is over! Please upgrade storage plan');

            //remove uploaded files
            if (!empty($file_name)) {
                foreach ($file_name as $file) {
                    $image = $dir . $file["name"];
                    if (\File::exists($image)) {
                        chmod($image, 0755);
                        \File::delete($image);
                    }
                }
            }
            return $msg;
        }

        

        $gallery = null;

        if (!empty($file_name)) {
            foreach ($file_name as $file) {
                $gallery = new Gallery();
                $gallery['gallery_img'] = $file["name"];
                $gallery['image_size'] = $file["size"];
                $gallery['store_id'] = $store_id->id;
                $gallery['gallery_categorie'] = $request->gallery_categorie;
                $gallery['created_by'] = \Auth::user()->creatorId();
                $gallery->save();
            }

            //update storage usage for gallery images
            Auth::user()->updateStorageUsage(Utility::getStorageUsage());
        }
        if (!empty($gallery)) {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Gallery Successfully Created');
        } else {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Gallery Created Failed');
        }

        return $msg;
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
    public function edit(Gallery $gallery)
    {
        $galleryCategories = GalleryCategorie::pluck('name', 'id');
        return view('gallery.edit', compact('gallery', 'galleryCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {


        $user     = \Auth::user();
        $pro_cat = Gallery::where('id', $request->id)->where('store_id', Auth::user()->current_store)->first();

        $validator = \Validator::make(
            $request->all(),
            [
                'gallery_categorie' => 'required|max:120',
                'gallery_img' => 'mimes:jpeg,png,jpg|max:20480',
            ]
        );


        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            $msg['flag'] = 'error';
            $msg['msg']  = $messages->first();

            return redirect()->back()->with('error', $msg['msg']);
        }


        if (!empty($request->gallery_img)) {
            if (!empty($pro_cat->gallery_img)) {
                if (asset(Storage::exists('uploads/gallery_image/' . $pro_cat->gallery_img))) {
                    asset(Storage::delete('uploads/gallery_image/' . $pro_cat->gallery_img));
                }
            }

            $filenameWithExt  = $request->file('gallery_img')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('gallery_img')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/gallery_image/');
            if (asset(Storage::exists('uploads/gallery_image/' . ($gallery['gallery_img'])))) {
                asset(Storage::delete('uploads/gallery_image/' . $gallery['gallery_img']));
            }

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }


            $img = \Image::make($request->file('gallery_img'));
            if ($img->width() >= 1280) {
                $img->fit(1280, 720);
            }

            $img->save($dir . $fileNameToStores, 90);
            // $path = $request->file('gallery_img')->storeAs('uploads/gallery_image/', $fileNameToStores);

            if (Utility::getStorageUsage() >= $user->total_storage) {
                //available storage exceeded
                $msg['flag'] = 'error';
                $msg['msg']  = __('Your available storage is over! Please upgrade storage plan');

                //remove uploaded files
                $image = $dir . $fileNameToStores;
                if (\File::exists($image)) {
                    chmod($image, 0755);
                    \File::delete($image);
                }
                return redirect()->back()->with('error', $msg['msg']);
            }
        }


        if (!empty($fileNameToStores)) {
            $gallery['gallery_img'] = $fileNameToStores;
            $gallery['image_size'] = $img->filesize() / 1048576;
        }
        $gallery['created_by'] = \Auth::user()->creatorId();
        $gallery['gallery_categorie'] = $request->gallery_categorie;
        $gallery->update();


        //update storage usage for gallery images
        Auth::user()->updateStorageUsage(Utility::getStorageUsage());



        return redirect()->back()->with('success', __('Gallery updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {

        $gallery->delete();
        //update storage usage for gallery images
        Auth::user()->updateStorageUsage(Utility::getStorageUsage());

        return redirect()->back()->with(
            'success',
            __('Gallery has been deleted!')
        );
    }
}
