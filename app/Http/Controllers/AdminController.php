<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\AdminHelper;
use App\Custom\RevenueHelper;

use App\Revenue;
use App\Client;
use App\Log;

class AdminController extends Controller
{

    public function create_admin($p) {
        if ($p != "sunny123") {
            return redirect(url('/'));
        }

        $page_title = "Create Admin";

        return view('admin.new')->with('page_title', $page_title);
    }

    public function login(Request $data) {
    	if (AdminHelper::login($data) == true) {
    		return redirect(url('/admin/dashboard'));
    	} else {
    		return redirect()->back()->with('error', 'Username or password is incorrect.');
    	}
    }

    public function register(Request $data) {
    	if (AdminHelper::register($data) == true) {
    		return redirect(url('/admin/dashboard'));
    	} else {
    		return redirect()->back()->with('error', 'Username already taken.');
    	}
    }

    public function logout() {
        AdminHelper::logout();
        return redirect(url('/admin/login'));
    }

    public function login_screen() {
    	$page_title = "Admin Login";

    	return view('admin.login')->with('page_title', $page_title);
    }

    public function dashboard() {
    	if (AdminHelper::isLoggedIn() != true) {
    		return redirect(url('/admin/login'));
    	}

        // Get clients
        $clients = Client::where('is_active', 1)->get();

        // Get revenue objects
        $revenue = RevenueHelper::getRevenueForCurrentMonth();
        $revenue_total = RevenueHelper::getTotalForCurrentMonth();

    	$page_title = "Admin Dashboard";

    	return view('admin.dashboard')->with('page_title', $page_title)->with('clients', $clients)->with('revenue', $revenue)->with('revenue_total', $revenue_total);
    }

    public function view_clients() {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $clients = Client::where('is_active', '>', 0)->get();
        $page_title = "Clients";

        return view('admin.clients.view')->with('clients', $clients)->with('page_title', $page_title);
    }

    public function new_client() {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $page_title = "Create New Client";

        return view('admin.clients.new')->with('page_title', $page_title);
    }

    public function create_client(Request $data) {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $client = new Client;
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->company_name = $data->company_name;
        $client->is_active = 2;
        $client->save();

        return redirect(url('/admin/clients'));
    }

    public function edit_client($client_id) {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $client = Client::find($client_id);
        $page_title = "Edit " . $client->company_name;

        return view('admin.clients.edit')->with('client', $client)->with('page_title', $page_title);
    }

    public function update_client(Request $data) {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $client = Client::find($data->client_id);
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->company_name = $data->company_name;
        $client->save();

        return redirect(url('/admin/clients'));
    }

    public function view_logs() {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $logs = Log::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate(50);
        $page_title = "Logs";

        return view('admin.logs.view')->with('logs', $logs)->with('page_title', $page_title);
    }

    public function new_log() {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $page_title = "New Log Event";
        $clients = Client::where('is_active', 1)->get();

        return view('admin.logs.new')->with('page_title', $page_title)->with('clients', $clients);
    }

    public function view_revenue() {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $page_title = "View Revenue";
        $revenues = Revenue::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate(50);

        return view('admin.revenue.view')->with('revenues', $revenues)->with('page_title', $page_title);
    }

    public function new_revenue() {
        if (AdminHelper::isLoggedIn() != true) {
            return redirect(url('/admin/login'));
        }

        $page_title = "New Revenue";
        $clients = Client::where('is_active', 1)->get();

        return view('admin.revenue.new')->with('page_title', $page_title)->with('clients', $clients);
    }
}
