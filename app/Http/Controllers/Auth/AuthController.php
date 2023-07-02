<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            User::create($request->validated() + ['role' => User::ROLE_PROPERTY_OWNER]);
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
}
