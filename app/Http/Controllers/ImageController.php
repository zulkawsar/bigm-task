<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image as InterventionImage;


class ImageController extends Controller
{
	public function __construct () 
	{
	    
	    $this->file_path = storage_path('app/public/');
        $this->save_path_review = 'storage/';
	}
		
    public function dropzone(Request $request)
    {
        $file_path = $this->file_path.$request->folder_name;
        
        try {
            if ($request->todo == 'upload') {

                if (!is_dir($file_path)) {
                    mkdir($file_path, 0777);
                }

                $photo = $request->file('file');
                $realPath = $photo->getRealPath();

                $name = $storage_save = sha1(date('YmdHis') . Str::random(30)).'.'.$photo->getClientOriginalExtension();
                $public_save = $this->save_path_review.$request->folder_name. '/' .$name;

                // Image cache and resize
                $photo_path = $file_path;
                if ($request->type == 'cv') {
                    $request->file->move($file_path, $name);
                }else{
                    InterventionImage::cache(function($image) use ($realPath, $photo_path, $storage_save) {
                        $image->make($realPath)->save($photo_path . '/' . $storage_save);
                    });
                }
                
                $upload = new Image();
                $upload->url = $public_save;
                $upload->default = $request->identity == 'thumb' ? 1 : 0;
                $upload->type = $request->type;
                $upload->save();

                return response()->json($upload->id);
            }
            if ($request->todo == 'delete') {
                
                $uploaded_image = Image::where('id', $request->id)->first();

                if (empty($uploaded_image)) {
                    return Response::json(['message' => 'Sorry file does not exist'], 400);
                }

                $file_path_review = public_path() . '/' . $uploaded_image->url;

                if (file_exists($file_path_review)) {
                    unlink($file_path_review);
                }
                if (!empty($uploaded_image)) {
                    Image::where('id', $request->id)->delete();
                }

                return response()->json($request->id);
            }
        
        }catch (ModelNotFoundException $e) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }
    }
}
