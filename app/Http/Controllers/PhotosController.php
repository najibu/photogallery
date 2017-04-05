<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PhotosController extends Controller
{

    // Show create form
    public function create()
    {
      die('Photos/create');
    }

    // Store photo
    public function store(Request $request)
    {
      
    }

    // Show photo details
    public function details($id)
    {
      die($id);
    }
}
