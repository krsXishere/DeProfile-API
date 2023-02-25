<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\APIFormatter;
use Hash;
// use Illuminate\SupportFacades/Validator;

class UserController extends Controller
{
    public function index() {
        $user = User::all();

        if($user) {
            return APIFormatter::createAPI(200, 'Success', $user);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function userProfile(Request $request) {
        $user = $request->user();

        if ($user) {
            return APIFormatter::createAPI(200, 'Success', $user);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = User::where('id', '=', $id)->orWhere('nama','LIKE','%'.$id.'%')->first();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $users = $request->user();

            $users->update($request->all());

            $data = User::where('id', '=', $users->id)->first();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            echo $error;
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function changePassword(Request $request) {
        $validator = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password',
        ]);

        if(!$validator) {
            return response()->json([
                'message' => 'validasi gagal',
            ], 422);
        }

        $user = $request->user();

        if(Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);

            return response()->json([
                'message' => 'Ubah kata sandi berhasil.',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Ubah kata sandi gagal.',
            ], 400);
        }
    }

    public function fotoProfilUser(Request $request) {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_path = $request->file('image')->store('users_picture', 'public');

            $users = $request->user();
            $users->image = $image_path;
            $users->save();

            $data = User::where('id', '=', $users->id)->first();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function editFotoProfilUser(Request $request) {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $users = $request->user();

            $old_image_path = public_path().'/storage'.'/'.$users->image;
            if(!$old_image_path) {
                unlink($old_image_path);
            }

            $image_path = $request->file('image')->store('users_picture', 'public');
            $users->image = $image_path;
            $users->save();

            $data = User::where('id', '=', $users->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
