<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Books extends Controller
{
    public function index()
    {
        return view('pages.books.books_list');
    }
}
