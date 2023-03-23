<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserWEBController extends Controller
{
    public function index() {
        $users = DB::select("select users.id, users.name, users.email, users.image, levels.level from users, levels where levels.id = users.level_id order by name asc");

        return view('admin.user.user', [
            'title' => 'De\'Profile User',
            'user' => $users,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'level_id' => 'required',
        ]);

        $status_akun = "Sudah digunakan";

        if($request->level_id = '2') {
            $status_akun = "Belum digunakan";
        }

        $image = $request->file('image');
        $image_path = $request->file('image')->store('users_picture', 'public');
        $image->move(public_path('storage/users_picture'), $image_path);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => $image_path,
            'level_id' => $request->level_id,
            'status_akun' => $status_akun,
        ]);
        
        return redirect()->route('user');
    }

    public function create() {
        $levels = DB::select("select * from levels");

        return view('admin.user.add_user', [
            'title' => 'De\'Profile Tambah User',
            'level' => $levels,
        ]);
    }

    public function edit(Request $request, $id) {
        $user = DB::select("select * from users where id = '" .$id. "'");
        
        return view('admin.user.edit_user', [
            'title' => 'De\'Profile Edit User',
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $users = User::find($id);

        $old_image_path = public_path().'/storage'.'/'.$users->image;
        $image_path = $request->file('image')->store('users_picture', 'public');
        $image = $request->file('image');
        
        if(!$old_image_path) {
            if(file_exist($old_image_path)) {
                unlink($old_image_path);
                $image->move(public_path('storage/users_picture'), $image_path);
                $users->image = $image_path;
                $users->save();
            } else {
                $image->move(public_path('storage/users_picture'), $image_path);
                $users->image = $image_path;
                $users->save();
            }
        } else {
            $image->move(public_path('storage/users_picture'), $image_path);
            $users->image = $image_path;
            $users->save();
        }

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => $image_path,
        ]);
        
        return redirect()->route('user');
    }

    public function destroy($id) {
        $user = User::find($id);
        $old_image_path = public_path().'/storage'.'/'.$user->image;
        if(file_exists($old_image_path)) {
            unlink($old_image_path);
        }
        $user->delete();

        return redirect()->route('user');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $users = DB::select("select * from users, levels where users.level_id = levels.id and (name like '%" .$request->search. "%' or email like '%" .$request->search. "%' or level like '%" .$request->search. "%')");

        return view('admin.user.user', [
            'title' => 'De\'Profile User',
            'user' => $users,
        ]);
    }
}
