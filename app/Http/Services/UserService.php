<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class UserService {

    public function findAll($object = ['paginate' => 10])
    {
        return User::orderBy()->paginate($object['paginate']);
    }

    public function login($credential = ['username' => '', 'password' => ''], $remember = false)
    {
        try {
            if(Auth::attempt($credential)) return redirect()->route('home');
            // else if(Auth::guard('siswa')->attempt($credential)) return redirect()->route('test.siswa');
            else return redirect()->back()->withErrors(['notif' => 'username atau password salah']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
