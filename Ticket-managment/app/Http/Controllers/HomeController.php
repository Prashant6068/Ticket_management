<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resolve = ticket::where('status', 'dispatched')->whereDate('updated_at', Carbon::today())->count();
        $closed = ticket::where('status', 'closed')->whereDate('updated_at', Carbon::today())->count();
        $active = ticket::where('status', 'pending')->whereDate('updated_at', Carbon::today())->count();
        $agents = User::where('role', 'agent')->where('status', 'active')->count();

        return view('home', compact('resolve', 'closed', 'active', 'agents'));
    }
}
