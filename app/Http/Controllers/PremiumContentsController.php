<?php

namespace App\Http\Controllers;

use App\Custom\AdminHelper;
use App\Custom\ClientHelper;
use App\Custom\UploadsHelper;

use App\PremiumContent;

use Illuminate\Http\Request;

class PremiumContentsController extends Controller
{

    /* --------------------------- *\
        Admin Functions
    \* --------------------------- */

    /*
     *  def: Returns the main dashboard view for admin
     *  args: none
     *  returns: view
     */
    public function admin_view() {
        if (AdminHelper::isLoggedIn() == false) {
            return redirect(url('/admin'));
        }

        // Page SEO
        $page_title = "Premium Content";
        $seo_array = array(
            "title" => $page_title,
            "og:title" => $page_title,
            "twitter:card" => "summary_large_image"
        );

        return view('admin.premium-content.view')->with('seo_array', $seo_array)->with('page_title', $page_title);
    }

    public function client_view() {
        if (ClientHelper::isLoggedIn() == false) {
            return redirect(url('/clients/login'));
        }

        // Page SEO
        $page_title = "Premium Content";
        $seo_array = array(
            "title" => $page_title,
            "og:title" => $page_title,
            "twitter:card" => "summary_large_image"
        );

        $content = PremiumContent::active()->get();

        return view('clients.premium-content.view')->with('seo_array', $seo_array)->with('page_title', $page_title)->with('content', $content);
    }

	/* --------------------------- *\
		Client Functions
    \* --------------------------- */

    public function download() {
    	$content = PremiumContent::find($_GET['content_id']);
    	$content->downloads = $content->downloads + 1;
    	$content->save();

    	$path = $content->content_url;
    	if (file_exists($path)) {
	        return Response::download($path);
	    }
    }

    /* --------------------------- *\
        Get Functions
    \* --------------------------- */

    public function get() {
        return response()->json(PremiumContent::active()->get()->toArray(), 200);
    }
    
	/* --------------------------- *\
		CRUD Functions
    \* --------------------------- */

    public function create(Request $data) {
    	$content = new PremiumContent;
    	$content->title = $data->title;
    	$content->description = $data->description;
    	$content->image_url = $data->image_url;

    	$extension = $data->file('file')->getClientOriginalExtension();
    	if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'webp') {
    		$content->file_type = 1;
    	} elseif ($extension == "pdf") {
    		$content->file_type = 2;
    	} elseif ($extension == 'pptx' || $extension == 'ppsx' || $extension == 'pptm' || $extension == 'ppt') {
    		$content->file_type = 3;
    	} elseif ($extension == 'doc' || $extension == 'docx' || $extension == 'txt') {
    		$content->file_type = 4;
    	} elseif ($extension == 'mp4' || $extension == 'mov') {
    		$content->file_type = 5;
    	} elseif ($extension == 'mp3' || $extension == 'wav' || $extension == 'aac' || $extension == 'aiff') {
    		$content->file_type = 6;
    	} else {
    		$content->file_type = 7;
    	}

    	$content->content_url = UploadsHelper::uploadFileLocally($data, 'premium-content');
    	$content->category = $data->category;
    	$content->save();

    	return response()->json(true, 200);
    }

    public function read() {
        return response()->json(PremiumContent::find($_GET['content_id'])->toArray(), 200);
    }

    public function update(Request $data) {
    	$content = PremiumContent::find($data->content_id);
    	$content->title = $data->title;
    	$content->description = $data->description;
    	$content->image_url = $data->image_url;

    	if ($data->has('file')) {
    		$extension = $data->file('file')->getClientOriginalExtension();
	    	if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'webp') {
	    		$content->file_type = 1;
	    	} elseif ($extension == "pdf") {
	    		$content->file_type = 2;
	    	} elseif ($extension == 'pptx' || $extension == 'ppsx' || $extension == 'pptm' || $extension == 'ppt') {
	    		$content->file_type = 3;
	    	} elseif ($extension == 'doc' || $extension == 'docx' || $extension == 'txt') {
	    		$content->file_type = 4;
	    	} elseif ($extension == 'mp4' || $extension == 'mov') {
	    		$content->file_type = 5;
	    	} elseif ($extension == 'mp3' || $extension == 'wav' || $extension == 'aac' || $extension == 'aiff') {
	    		$content->file_type = 6;
	    	} else {
	    		$content->file_type = 7;
	    	}

	    	$content->content_url = UploadsHelper::uploadFileLocally($data, 'premium-content');
    	}

    	$content->category = $data->category;
    	$content->save();

    	return response()->json(true, 200);
    }

    public function delete(Request $data) {
    	$content = PremiumContent::find($data->content_id);
    	$content->is_active = 0;
    	$content->save();

    	return response()->json(true, 200);
    }

}
