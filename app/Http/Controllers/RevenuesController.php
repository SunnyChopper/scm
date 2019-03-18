<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Revenue;

class RevenuesController extends Controller
{
    public function create(Request $data) {
    	$revenue = new Revenue;
    	$revenue->client_id = $data->client_id;
    	$revenue->report_date = $data->report_date;
    	$revenue->amount = $data->amount;
    	$revenue->save();

        return redirect(url($data->redirect_url));
    }

    public function read($revenue_id) {
    	$revenue = Revenue::find($revenue_id);
    	$page_title = $revenue->report_date;

    	return view('clients.view-revenue')->with('page_title', $page_title)->with('revenue', $revenue);
    }

    public function update(Request $data) {
    	$revenue = Revenue::find($data->revenue_id);
    	$revenue->report_date = $data->report_date;
    	$revenue->amount = $data->amount;
    	$revenue->save();
    }

    public function delete(Request $data) {
    	$revenue = Revenue::find($data->revenue_id);
    	$revenue->is_active = 0;
    	$revenue->save();
    }

    public function view_all() {
        $client_id = $this->get_client_id();
        $page_title = "Revenue";
        $revenues = Revenue::where('client_id', $client_id)->get();
        return view('clients.revenue.view')->with('page_title', $page_title)->with('revenues', $revenues);
    }

    private function get_client_id() {
        if (Session::has('client_id')) {
            return Session::get('client_id');
        } else {
            return 0;
        }
    }
}
