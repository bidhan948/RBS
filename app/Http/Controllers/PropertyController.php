<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.property.property', [
            // 'properties' => (property::query()
            //     ->when($user->role != User::ROLE_SUPERADMIN, function ($q) use ($user) {
            //         $q->where('user_id', $user->id);
            //     })
            //     ->where('user_id', $user->id)
            //     ->paginate(25)) ?? []
            'properties' =>  []
        ]);
    }

    public function create(): View
    {
        return view('admin.property.ceate_property');
    }
}
