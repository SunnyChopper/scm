<?php

namespace App\Http\Controllers;

use Auth;

use App\BeforeAndAfter;
use App\LeadMagnet;

use Illuminate\Http\Request;

class LeadMagnetBuilderKitController extends Controller
{

	/* -------------------------- *\
		Views
	\* -------------------------- */


	/*
	 *	def: Returns the main dashboard for the Lead Magnet Builder Kit
	 *	args: none
	 *	returns: view
	 */
	public function index() {
		// Check to see if public access
		if (Auth::guest() == true) {
			$is_public = true;
		} else {
			$is_public = false;
		}

		// Get assets if we can
		if ($is_public == false) {
			// Get before and after
			$before_and_after = BeforeAndAfter::where('user_id', Auth::id())->where('is_active', 1)->get();

			// Get lead magnets
			$lead_magnets = LeadMagnet::where('user_id', Auth::id())->where('is_active', 1)->get();
		}

		// Page SEO
		$page_title = "Lead Magnet Builder Kit";
		$page_description = "Having troubling coming up with ideas for lead magnets? Use our Lead Magnet Builder Kit software to come up with ideas that will help drive more traffic to your businesss";
		$page_image = "https://memberpress.com/wp-content/uploads/2018/02/lead-magnet@2x-1024x768.png";
		$seo_array = array(
			"title" => $page_title,
			"description" => $page_description, 
			"og:title" => $page_title,
			"og:description" => $page_description,
			"og:image" => $page_image,
			"og:url" => "https://www.sunnychoppermedia.com/clients/tools/lead-builder",
			"twitter:card" => "summary_large_image"
		);

		// Return the view based on if it is public access or not
		if ($is_public == true) {
			return view('clients.tools.lmbk.index')->with('seo_array', $seo_array);
		} else {
			return view('clients.tools.lmbk.index')->with('before_and_after', $before_and_after)->with('lead_magnets', $lead_magnets)->with('seo_array', $seo_array);
		}
	}

	/* -------------------------- *\
		Get functions
	\* -------------------------- */

	public function get() {}
    
	/* -------------------------- *\
		CRUD Functions
	\* -------------------------- */

}
