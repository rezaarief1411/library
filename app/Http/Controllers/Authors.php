<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Authors as AuthorsModel;

class Authors extends Controller
{
    public function index()
    {
        return view('pages.authors.authors_list');
    }
}
