<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;
class UserController extends Controller
{
    public function index(){
        $users = User::paginate(50);
        return view('admin.users.index', compact('users'));
    }
    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }
    public function profile(){
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }
    public function profileUpdate(Request $request){
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,id,' . $user->id,
            'password' => 'nullable|confirmed|string|max:255|min:6'
        ]);
        $data = $request->only(['name', 'email']);
        if($request->password) $data['password'] = bcrypt($request->password);
        if($request->hasFile('photo')){
            if($user->photo) Storage::delete($user->photo);
            $data['photo'] = $request->file('photo')->store('users');
        }
        $user->update($data);
        session()->flash('success', 'Профиль успешно изменен');
        return redirect()->route('user.profile.show');
    }
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,id,' . $user->id,
            'password' => 'nullable|confirmed|string|max:255|min:6'
        ]);
        $data = $request->except('password');
        $data['active'] = $request->has('active');
        if($request->password) $data['password'] = bcrypt($request->password);
        if($request->hasFile('photo')){
            if($user->photo) Storage::delete($user->photo);
            $data['photo'] = $request->file('photo')->store('users');
        }
        $user->update($data);
        session()->flash('success', 'Данные пользователя успешно изменены успешно изменены');
        return redirect()->route('admin.users.index');
    }
    public function destroy(User $user){
        if($user->id == 1) abort(403);
        if($user->photo) Storage::delete($user->photo);
        $user->delete();
    }
}
