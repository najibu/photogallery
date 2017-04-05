<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
      
    }

    // Show Gallery photos 
    public function show($id)
    {
      die($id);
    }
}
