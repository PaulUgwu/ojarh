<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\Models\Gallery;
use App\Models\Product;
use App\VideoGallery;
use Image;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        if(count($prod->galleries))
        {
            $data[0] = 1;
            $data[1] = $prod->galleries;
        }
        return response()->json($data);              
    }  

    public function store(Request $request)
    { 
        $data = null;
        $lastid = $request->product_id;
        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                $val = $file->getClientOriginalExtension();
                if($val == 'jpeg'|| $val == 'jpg'|| $val == 'png'|| $val == 'svg')
                  {
                    $gallery = new Gallery;


        $img = Image::make($file->getRealPath())->resize(800, 800);
        $thumbnail = time().str_random(8).'.jpg';
        $img->save(public_path().'/assets/images/galleries/'.$thumbnail);

                    $gallery['photo'] = $thumbnail;
                    $gallery['product_id'] = $lastid;
                    $gallery->save();
                    $data[] = $gallery;                        
                  }
            }
        }
        return response()->json($data);      
    } 

    public function destroy()
    {

        $id = $_GET['id'];
        $gal = Gallery::findOrFail($id);
            if (file_exists(public_path().'/assets/images/galleries/'.$gal->photo)) {
                unlink(public_path().'/assets/images/galleries/'.$gal->photo);
            }
        $gal->delete();
            
    } 



    //*** GET Request
    public function video_index()
    {
        $videos = VideoGallery::where('user_id', FacadesAuth::user()->id)->get();
        return view('vendor.gallery.video_index', [
            'videos' => $videos
        ]);
    }

    //*** GET Request
    public function image_index()
    {
        $images = ImageGallery::where('user_id', FacadesAuth::user()->id)->get();
        return view('vendor.gallery.image_index', [
            'images' => $images
        ]);
    }

    public function image_store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url'   => ['required', 'image', 'max:3000']
        ]);

        if (!$request->hasFile('url')) {
            return redirect()->back()->with([
                'message' => 'Video was not saved, please try again.',
                'type' => 'fail'
            ]);
        }

        $path = $request->url->store('public/gallery');
        $path_parts = pathinfo($path);

        $new_image          = new ImageGallery();
        $new_image->user_id = FacadesAuth::user()->id;
        $new_image->title   = $request->title;
        $new_image->url     = $path_parts['basename'];
        $result             = $new_image->save();

        if($result){
            return redirect()->back()->with([
                'message' => 'image was added successfully.',
                'type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Image was not saved, please try again.',
            'type' => 'fail'
        ]);
    }

    public function video_store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url'   => ['required', 'string', 'url']
        ]);

        $new_video          = new VideoGallery();
        $new_video->user_id = FacadesAuth::user()->id;
        $new_video->title   = $request->title;
        $new_video->url     = $request->url;
        $result             = $new_video->save();

        if($result){
            return redirect()->back()->with([
                'message' => 'Video was added successfully.',
                'type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Video was not saved, please try again.',
            'type' => 'fail'
        ]);
    }

    public function image_edit(Request $request)
    {
        $request->validate([
            'id'    => ['required', 'integer', 'exists:image_galleries'],
            'title' => ['required', 'string', 'max:255'],
            'url'   => ['image', 'max:3000']
        ]);

        $image = ImageGallery::find($request->id);

        if ($request->hasFile('url')) {
            $path       = $request->url->store('public/gallery');
            $path_parts = pathinfo($path);
            $image->url = $path_parts['basename'];
        }
        
        $image->title = $request->title;
        $result       = $image->save();

        if($result){
            return redirect()->back()->with([
                'message' => 'Your request was successful.',
                'type'    => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Your request failed, please try again.',
            'type'    => 'fail'
        ]);
    }

    public function video_edit(Request $request)
    {
        $request->validate([
            'id'    => ['required', 'integer', 'exists:image_galleries'],
            'title' => ['required', 'string', 'max:255'],
            'url'   => ['required', 'url']
        ]);

        $image = VideoGallery::find($request->id);
        
        $image->url = $request->url;
        $image->title = $request->title;
        $result       = $image->save();

        if($result){
            return redirect()->back()->with([
                'message' => 'Your request was successful.',
                'type'    => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Your request failed, please try again.',
            'type'    => 'fail'
        ]);
    }

    public function image_delete($id)
    {
        $image = ImageGallery::find($id);

        if ($image) {
            $image->delete();
            return redirect()->back()->with([
                'message' => 'Your request was successful.',
                'type'    => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Your request failed, please try again.',
            'type'    => 'fail'
        ]);
    }

    public function video_delete($id)
    {
        $video = VideoGallery::find($id);

        if ($video) {
            $video->delete();
            return redirect()->back()->with([
                'message' => 'Your request was successful.',
                'type'    => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Your request failed, please try again.',
            'type'    => 'fail'
        ]);
    }

}
