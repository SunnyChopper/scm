<?php

namespace App\Http\Controllers;

use App\InvoiceProduct;

use App\Custom\AdminHelper;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

	/* --------------------------- *\
		Views
    \* --------------------------- */

    public function index() {
    	if (AdminHelper::isLoggedIn() == false) {
    		return redirect(url('/admin'));
    	}

    	$page_title = "Products";
        $page_header = $page_title;

    	return view('admin.products.index')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    /* --------------------------- *\
        Get Functions
    \* --------------------------- */

    public function get() {
        return response()->json(InvoiceProduct::active()->get()->toArray(), 200);
    }
    
    /* --------------------------- *\
		CRUD Functions
    \* --------------------------- */

    public function create(Request $data) {
    	$product = new InvoiceProduct;
    	$product->title = $data->title;;
    	$product->description = $data->description;
    	$product->image_url = $data->image_url;
    	$product->price = $data->price;
    	$product->save();

    	return response()->json(true, 200);
    }

    public function read() {
    	return response()->json(InvoiceProduct::find($_GET['product_id'])->toArray(), 200);
    }

    public function update(Request $data) {
    	$product = InvoiceProduct::find($data->product_id);
    	$product->title = $data->title;;
    	$product->description = $data->description;
    	$product->image_url = $data->image_url;
    	$product->price = $data->price;
    	$product->save();

    	return response()->json(true, 200);
    }

    public function delete(Request $data) {
    	$product = InvoiceProduct::find($data->product_id);
    	$product->is_active = 0;
    	$product->save();

    	return response()->json(true, 200);
    }

}
