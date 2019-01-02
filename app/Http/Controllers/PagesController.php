<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	// Dynamic page features
    	$page_title = "Home";

    	return view('pages.index')->with('page_title', $page_title);
    }
}
