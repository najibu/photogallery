<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class GalleryController extends Controller
{
    // List Galleries
    public function index()
    {
      return view('gallery.index');
    }

    // Show create form
    public function create()
    {
      return view('gallery.create');
    }

    // Store gallery
    public function store(Request $request)
    {
      //Get request input
      $name = $request->get('name');
      $description = $request->get('description');
      $cover_image = $request->file('cover_image');
      $owner_id = 1;

      // Check image upload
      if ($cover_image) {
          $cover_image_filename = $cover_image->getClientOriginalName();
          $cover_image->move(public_path('images'), $cover_image_filename);
      } else {
        $cover_image_filename = 'noimage.jpg';
      }

      // Insert gallery
      DB::table('galleries')->insert(
        [
            'name' => $name, 
            'description' => $description,
            'cover_image' => $cover_image_filename,
            'owner_id' => $owner_id
        ]
      );

      //Redirect 
      return \Redirect::route('gallery.index')->with('message', 'Gallery Created');
    }

    // Show Gallery photos 
    public function show($id)
    {
      die($id);
    }
}
