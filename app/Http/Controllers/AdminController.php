<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Custom\AdminHelper;
use App\Custom\RevenueHelper;
use App\Custom\ClientHelper;

use App\Mail\NewClient;

use App\Revenue;
use App\Client;
use App\Log;
use App\Task;

class AdminController extends Controller
{

    public function test() {
        Mail::to("ishy.singh@gmail.com")->send(new NewClient("Sunny", 1));
    }

    public function create_admin($p) {
        if ($p != "sunny123") {
            return redirect(url('/'));
        }

        $page_title = "Create Admin";

        return view('admin.new')->with('page_title', $page_title);
    }

    public function login(Request $data) {
    	if (AdminHelper::login($data) == true) {
            Session::put('admin_logged_in', true);
            Session::put('admin_id', $id);
            Session::save();
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
        $clients = Client::where('is_active', '>', 0)->get();

        // Get revenue objects
        $revenue = RevenueHelper::getRevenueForCurrentMonth();
        $revenue_total = RevenueHelper::getTotalForCurrentMonth();

    	// Page SEO
        $page_title = "Admin Dashboard";
        $seo_array = array(
            "title" => $page_title,
            "og:title" => $page_title,
            "og:url" => "https://www.sunnychoppermedia.com/admin/dashboard"
        );

    	return view('admin.dashboard')->with('seo_array', $seo_array)->with('clients', $clients)->with('revenue', $revenue)->with('revenue_total', $revenue_total);
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

        // Create the client
        $client = new Client;
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->company_name = $data->company_name;
        $client->is_active = 2;
        $client->save();

        // Send the email
        Mail::to($client->email)->send(new NewClient($data->first_name, $client->id));

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
        $clients = Client::where('is_active', '>', 0)->get();

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

    public function view_tasks() {
        $page_title = "Tasks";

        // Get tasks
        $tasks = Task::where('is_active', 1)->paginate(50);

        return view('admin.tasks.view')->with('page_title', $page_title)->with('tasks', $tasks);
    }

    public function new_task() {
        $page_title = "Create New Task";

        $clients = Client::where('is_active', '>', 0)->get();

        return view('admin.tasks.new')->with('page_title', $page_title)->with('clients', $clients);
    }

    public function edit_task($task_id) {
        $page_title = "Edit Task";

        $task = Task::find($task_id);

        return view('admin.tasks.edit')->with('page_title', $page_title)->with('task', $task);
    }
}
