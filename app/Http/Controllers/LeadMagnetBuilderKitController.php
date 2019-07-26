<?php

namespace App\Http\Controllers;

use App\BeforeAndAfter;
use App\LeadMagnet;

use App\Custom\ClientHelper;

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
		if (ClientHelper::guest() == true) {
			$is_public = true;
		} else {
			$is_public = false;
		}

		// Get assets if we can
		if ($is_public == false) {
			// Get before and after
			$before_and_after = BeforeAndAfter::where('user_id', ClientHelper::getID())->where('is_active', 1)->get();

			// Get lead magnets
			$lead_magnets = LeadMagnet::where('user_id', ClientHelper::getID())->where('is_active', 1)->get();
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

	public function get() {
		return response()->json(LeadMagnet::where('user_id', $_GET['user_id'])->active()->get()->toArray(), 200);
	}
    
	/* -------------------------- *\
		CRUD Functions
	\* -------------------------- */

	public function create_baa(Request $data) {
		$baa = new BeforeAndAfter;
		$baa->user_id = $data->user_id;
		$baa->before_have = $data->before_have;
		$baa->after_have = $data->after_have;
		$baa->before_feel = $data->before_feel;
		$baa->after_feel = $data->after_feel;
		$baa->before_day = $data->before_average_day;
		$baa->after_day = $data->after_average_day;
		$baa->before_status = $data->before_status;
		$baa->after_status = $data->after_status;
		$baa->save();

		return response()->json(true, 200);
	}

	public function update_baa(Request $data) {
		$baa = BeforeAndAfter::find($data->baa_id);
		$baa->before_have = $data->before_have;
		$baa->after_have = $data->after_have;
		$baa->before_feel = $data->before_feel;
		$baa->after_feel = $data->after_feel;
		$baa->before_day = $data->before_average_day;
		$baa->after_day = $data->after_average_day;
		$baa->before_status = $data->before_status;
		$baa->after_status = $data->after_status;
		$baa->save();

		return response()->json(true, 200);
	}

	public function create_idea(Request $data) {
		$idea = new LeadMagnet;
		$idea->user_id = $data->user_id;
		$idea->title = $data->title;
		$idea->promise = $data->promise;
		$idea->hook = $data->hook;
		$idea->category = $data->category;
		$idea->save();

		return response()->json(true, 200);
	}

	public function read_idea() {
		return response()->json(LeadMagnet::find($_GET["lead_id"])->toArray(), 200);
	}

	public function update_idea(Request $data) {
		$idea = LeadMagnet::find($data->lead_id);
		$idea->title = $data->title;
		$idea->promise = $data->promise;
		$idea->hook = $data->hook;
		$idea->category = $data->category;
		$idea->save();

		return response()->json(true, 200);
	}

	public function delete_idea(Request $data) {
		$idea = LeadMagnet::find($data->lead_id);
		$idea->is_active = 0;
		$idea->save();

		return response()->json(true, 200);
	}

}
