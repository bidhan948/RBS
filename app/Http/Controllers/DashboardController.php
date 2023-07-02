<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardAdmin(): View
    {
        return view('admin.dashboard', [
            'users' => User::query()
                ->where('role', '!=', User::ROLE_SUPERADMIN)
                ->get()
        ]);
    }
}
