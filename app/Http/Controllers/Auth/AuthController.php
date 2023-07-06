<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function propertyOwnerLogin(): View
    {
        return view('auth.login', [
            'role' => User::ROLE_PROPERTY_OWNER
        ]);
    }

    public function register($role): View
    {
        abort_if(!in_array($role, User::ROLE), 404);

        return view('auth.register', ['role' => $role]);
    }

    public function registerSubmit(AuthRequest $request, $role): RedirectResponse
    {
        abort_if(!in_array($role, User::ROLE), 404);
        DB::beginTransaction();
        try {
            User::create($request->validated() + ['role' => User::ROLE_PROPERTY_OWNER, 'status' => User::STATUS_FALSE]);
            toast("Property Owner Credential created successfully wait for superadmin aproval", "success");
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            info($e->getMessage());
            DB::rollBack();
            toast(config('CONSTANT.ERR_MSG'), "success");
            return redirect()->back();
        }
    }

    public function loginSubmit(LoginRequest $request, $role): RedirectResponse
    {
        abort_if(!in_array($role, User::ROLE), 404);

        if (Auth::attempt($request->validated())) {

            $user = User::query()
                ->where('email', $request->email)
                ->first();

            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function  logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function approveUser(User $user): RedirectResponse
    {
        abort_if(auth()->user()->role != User::ROLE_SUPERADMIN, 403);
        $user->update(['status' => User::STATUS_TRUE]);
        toast("User approved successfully", "success");
        return redirect()->back();
    }
    public function disapproveUser(User $user): RedirectResponse
    {
        abort_if(auth()->user()->role != User::ROLE_SUPERADMIN, 403);
        $user->update(['status' => User::STATUS_FALSE]);
        toast("User disapproved successfully", "success");
        return redirect()->back();
    }
}
