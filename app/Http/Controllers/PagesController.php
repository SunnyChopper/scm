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

    	return view('pages.contact')->with('page_title', $page_title);
    }

    public function pricing() {
    	$page_title = "Pricing";

    	return view('pages.pricing')->with('page_title', $page_title);
    }

    public function web_dev_service() {
    	$page_title = "Web Development Services";

    	return view('services.web-dev')->with('page_title', $page_title);
    }
}
