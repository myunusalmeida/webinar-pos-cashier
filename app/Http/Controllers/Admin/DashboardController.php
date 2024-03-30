<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'count_menus' => Menu::count(),
            'count_cashiers' => User::where('role', 'kasir')->count()
        ]);
    }
}
