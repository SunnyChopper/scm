<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revenue;

class RevenuesController extends Controller
{
    public function create(Request $data) {
    	$revenue = new Revenue;
    	$revenue->client_id = $data->client_id;
    	$revenue->report_date = $data->report_date;
    	$revenue->amount = $data->amount;
    	$revenue->save();
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
}
