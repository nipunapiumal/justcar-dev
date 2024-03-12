<?php

namespace App\Http\Controllers;

use App\Models\AutoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AutoGalleryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'super admin') {
            $user             = Auth::user();
            $galleries         = AutoGallery::orderBy('id', 'DESC')->get();
            return view('auto_gallery.index', compact('galleries'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auto_gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (\Auth::user()->type == 'super admin') {
            $user     = Auth::user();
            // $store_id = Store::where('id', $user->current_store)->first();

            $validator = Validator::make(
                $request->all(),
                [
                    'type' => 'required|max:120',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                $msg['flag'] = 'error';
                $msg['msg']  = $messages->first();

                return $msg;
            }

            $gallery = new AutoGallery();
            $folder = $gallery->getStoredDir($request->type);

            $file_name = [];
            if (!empty($request->multiple_files) && count($request->multiple_files) > 0) {
                foreach ($request->multiple_files as $file) {
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $dir             = storage_path('uploads/' . $folder . '/');

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




            if (!empty($file_name)) {
                foreach ($file_name as $file) {

                    $gallery['type'] = $request->type;
                    $gallery['gallery_img'] = $file["name"];
                    $gallery['created_by'] = Auth::user()->creatorId();
                    $gallery->save();
                }

                //update storage usage for gallery images
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = explode("|", $id);
        $group = $data[0];
        $element = $group;

        if (isset($data[1])) {
            $element = $data[1];
        }

        $gallery = new AutoGallery();
        $folder = $gallery->getStoredDir($group);

        $store_logo = asset(Storage::url('uploads/' . $folder . '/'));
        $output = '<form class="auto-gallery">';
        $output .= '<div class="row row-cols-1 row-cols-md-3 g-4">';
        $auto_galleries = AutoGallery::where('type', $group)->get();
        foreach ($auto_galleries as $auto_gallery) {

            $output .= '<div class="col">';
            $output .= '<div class="card mb-0">';
            // $output .= '<label>';
            $output .= '<input type="radio" name="selectedImage" class="radio-button" id="image' . $auto_gallery->id . '" value="' . $auto_gallery->gallery_img . '">';

            // $output .= '<img src="http://localhost/justcar/storage/uploads/product_image/Mazda_RX-8_on_freeway_1659411685_1661060932.jpeg" class="card-img-top" alt="...">';
            $output .= '<img src="' . $store_logo . '/' . $auto_gallery->gallery_img . '" class="card-img-top" data-element="' . $element . '" alt="...">';
            // $output .= '</label>';
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        $output .= '</form>';



        return response()->json(
            [
                'output' => $output,
                'status' => 'error',
                'success' => __('Failed'),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoGallery $auto_gallery)
    {
        // $galleryCategories = GalleryCategorie::pluck('name', 'id');
        return view('auto_gallery.edit', compact('auto_gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutoGallery $auto_gallery)
    {


        $user     = Auth::user();
        // $pro_cat = AutoGallery::where('id', $request->id)->first();

        $validator = Validator::make(
            $request->all(),
            [
                'type' => 'required|max:120',
                'gallery_img' => 'mimes:jpeg,png,jpg|max:20480',
            ]
        );


        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            $msg['flag'] = 'error';
            $msg['msg']  = $messages->first();

            return redirect()->back()->with('error', $msg['msg']);
        }

        $folder = $auto_gallery->getStoredDir($request->type);

        if (!empty($request->gallery_img)) {
            if (!empty($auto_gallery->gallery_img)) {
                if (asset(Storage::exists('uploads/' . $folder . '/' . $auto_gallery->gallery_img))) {
                    asset(Storage::delete('uploads/' . $folder . '/' . $auto_gallery->gallery_img));
                }
            }

            $filenameWithExt  = $request->file('gallery_img')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('gallery_img')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/' . $folder . '/');
            if (asset(Storage::exists('uploads/' . $folder . '/' . ($auto_gallery->gallery_img)))) {
                asset(Storage::delete('uploads/' . $folder . '/' . $auto_gallery->gallery_img));
            }

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }


            $img = \Image::make($request->file('gallery_img'));
            if ($img->width() >= 1280) {
                $img->fit(1280, 720);
            }

            $img->save($dir . $fileNameToStores, 90);
            // $path = $request->file('gallery_img')->storeAs('uploads/auto_gallery_images/', $fileNameToStores);

        }


        if (!empty($fileNameToStores)) {
            $auto_gallery['gallery_img'] = $fileNameToStores;
            // $gallery['image_size'] = $img->filesize() / 1048576;
        }
        $auto_gallery['created_by'] = Auth::user()->creatorId();
        // $gallery['gallery_categorie'] = $request->gallery_categorie;
        $auto_gallery->update();

        return redirect()->back()->with('success', __('Gallery updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoGallery $gallery)
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
