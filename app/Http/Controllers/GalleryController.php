<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GalleryController extends Controller
{
    // List Galleries
    public function index()
    {
      die('Gallery/index');
    }

    // Show create form
    public function create()
    {
      die('Gallery/create');
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
