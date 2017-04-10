<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
    private $table = 'photos';

    // Show create form
    public function create($gallery_id)
    {
      // Render view 
      return view('photos.create', compact('gallery_id'));
    }

    // Store photo
    public function store(Request $request)
    {
      //Get request input
      $gallery_id = $request->get('gallery_id');
      $title = $request->get('title');
      $description = $request->get('description');
      $location = $request->get('location');
      $image = $request->file('image');
      $owner_id = 1;

      // Check image upload
      if ($image) {
          $image_filename = $image->getClientOriginalName();
          $image->move(public_path('images'), $image_filename);
          } else {
            $image_filename = 'noimage.jpg';
      }

      // Insert gallery
      DB::table($this->table)->insert(
        [
            'title' => $title, 
            'description' => $description,
            'location' => $location,
            'image' => $image_filename,
            'owner_id' => $owner_id,
            'gallery_id' => $gallery_id
        ]
      );

      //Redirect 
      return \Redirect::route('gallery.show', array('id' => $gallery_id))->with('message', 'Photo Created');
    }

    // Show photo details
    public function details($id)
    {
      // Get photo
      $photo = DB::table($this->table)->where('id', $id)->first();

      //Render view
      return view('photos.details', compact('photo'));
    }
}
