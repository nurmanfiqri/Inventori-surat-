<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
       // Quicksearch Result
       public function quickSearch()
       {
           return view('layout.partials.extras._quick_search_result');
       }
}
