<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Custom\RevenueHelper;
use App\Custom\AdminHelper;

class RevenuesController extends Controller
{

    /* ------------------- *\
        Admin views
    \* ------------------- */

    public function admin_dashboard() {
        if (AdminHelper::isLoggedIn() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Revenue";

        return view('admin.revenue.view')->with('page_title', $page_title);
    }

    /* ------------------- *\
        Get functions
    \* ------------------- */

    public function get_revenue() {
        return response()->json(Revenue::active()->get()->toArray(), 200);
    }

}
