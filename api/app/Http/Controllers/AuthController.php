<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function __invoke()
    {
        return new UserResource(Auth::user());
    }

    public function setRole($id) {
        // $admin = Auth::user();
        // if ($admin->admin_access)
        // {
            $user = User::find($id);
            $user->admin_access = !$user->admin_access;
            $user->save();

            return $user;
        // } else {
        //     return $this->response(['message' => 'Forbidden.'], 403);
        // }
    }

    public function getUsers() {
        $users = User::get();

        return UserResource::collection($users);
    }
}
