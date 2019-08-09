<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	$page_title = "Home";

    	return view('pages.index')->with('page_title', $page_title);
    }

    public function contact() {
    	$page_title = "Contact";
        $page_header = $page_title;

    	return view('pages.contact')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function pricing() {
    	$page_title = "Pricing";
        $page_header = $page_title;

    	return view('pages.pricing')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function web_apps() {
    	$page_title = "Web App Services";
        $page_header = $page_title;

    	return view('services.web-apps')->with('page_title', $page_title)->with('page_header', $page_header);
    }
}
