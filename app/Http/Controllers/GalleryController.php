<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;

class GalleryController extends Controller
{

    // Set tablename 
    protected $table = 'galleries';

    // List Galleries
    public function index()
    {
      //Get all galleries 
      $galleries = DB::table($this->table)->get();

      // Render view
      return view('gallery.index', compact('galleries'));
    }

    // Show create form
    public function create()
    {
      // Check if logged in
      if (!Auth::check()) {
        //Redirect 
        return \Redirect::route('gallery.index');
      }
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
      DB::table($this->table)->insert(
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
      //Get gallery 
      $gallery = DB::table($this->table)->where('id', $id)->first();

      //Get photos
      $photos = DB::table('photos')->where('gallery_id', $id)->get();

      //Render view
      return view('gallery/show', compact('gallery', 'photos'));
    }
}
