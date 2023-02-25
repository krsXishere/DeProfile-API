<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Helpers\APIFormatter;

class AuthController extends Controller
{
    public function loginPublic(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'device_name' => 'required',
        ]); 

        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah.'],
            ]);
        } else {
            $token = $user->createToken($request->email, ['public-user'])->plainTextToken;
        }
    
        if($token) {
            return APIFormatter::createAPI(200, $token, $user);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            // 'device_name' => 'required',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            // 'device_name' => $fields['device_name'],
            'password' => bcrypt($fields['password']),
        ]);

        // $data = User::

        $token = $user->createToken($request->email)->plainTextToken;

        if($token) {
            return APIFormatter::createAPI(200, $token, $user);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function logout(Request $request, $tokenId)
    {
        $user = $request->user()->tokens()->where('id', $tokenId)->delete();

        if($user) {
            return APIFormatter::createAPI(200, 'Berhasil logout');
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function loginAdmin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'device_name' => 'required',
        ]); 

        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah.'],
            ]);
        } else {
            $token = $user->createToken($request->device_name, ['admin-user'])->plainTextToken;
        }
    
        if($token) {
            return APIFormatter::createAPI(200, $token, $user);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
    }
