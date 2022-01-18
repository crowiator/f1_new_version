<?php

namespace App\Http\Controllers;
/*
 * https://www.positronx.io/laravel-multiple-images-upload-with-validation-example/
 */
use Illuminate\Http\Request;
use App\Models\Image;

class FileUpload extends Controller
{
    //
    public function index()
    {
        //
        $images=Image::all();
       return view('images',compact('images'));
    }
    public function createForm(){
        return view('image-upload');
    }


    public function fileUpload(Request $req){
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if($req->hasfile('imageFile')) {
            foreach($req->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move('uploads/images/', $name);
                $imgData[] = $name;
            }
            //dd($imgData);
            $fileModal = new Image();
            $fileModal->name = $imgData;
            $fileModal->image_path = $imgData;


            $fileModal->save();

            return back()->with('success', 'File has successfully uploaded!');
        }
    }
}
