<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Client;

use Illuminate\Http\Request;

use App\Custom\InvoicesHelper;
use App\Custom\ClientHelper;

class InvoicesController extends Controller
{

	/* ---------------------------- *\
		Client views
	\* ---------------------------- */

	public function client_view() {
		$page_title = "Your Orders";

		$client = Client::find(ClientHelper::getID());
		$invoices = Invoice::where('client_id', ClientHelper::getID())->where('status', '!=', 0)->get();

		return view('clients.orders.view')->with('page_title', $page_title)->with('client', $client)->with('invoices', $invoices);
	}

	/* ---------------------------- *\
		CRUD Functions
	\* ---------------------------- */
    
	public function create(Request $data) {
		$invoice = new Invoice;
		$invoice->client_id = $data->client_id;
		$invoice->website = $data->website;
		$invoice->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(Invoice::find($_GET['invoice_id'])->toArray(), 200);
	}

	public function update(Request $data) {
		$invoice = Invoice::find($data->invoice_id);

		if (isset($data->website)) {
			$invoice->website = $data->website;
		}

		if (isset($data->price)) {
			$invoice->price = $data->price;
		}

		if (isset($data->products)) {
			$invoice->products = $data->products;
		}

		if (isset($data->customer_id)) {
			$invoice->customer_id = $data->customer_id;
		}

		if (isset($data->status)) {
			$invoice->status = $data->status;
		}

		$invoice->save();

		return response()->json(true, 200);
	}

	public function delete(Request $data) {
		$invoice = Invoice::find($data->invoice_id);
		$invoice->status = 0;
		$invoice->save();

		return response()->json(true, 200);
	} 

}
