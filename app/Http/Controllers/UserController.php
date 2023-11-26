<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->errors = new MessageBag();
    }

    public function home()
    {
        return view('welcome', ['title' => 'Home']);
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $user = new User([
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Registration Succcess');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'password' => ['The provided password are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function giveNilai(Request $request)
    {
        $data = [
            'nilai' => '25',
        ];

        User::where('user_name', 'Manakuslagi')->update($data);
        return redirect('/data');
    }

    public function ubahNilai(Request $request, $user_id)
    {
        $request->validate([
            'valnilai' => 'required|integer',
        ]);

        $nilai = $request->valnilai;
        // Cari user berdasarkan ID
        $user = User::find($user_id);

        // Jika user ditemukan, ubah nilai-nya
        if ($user) {
            $user->nilai = $nilai;
            $user->save();
        }

        // Redirect ke halaman yang diinginkan atau tampilkan pesan berhasil
        return redirect()->route('data')->with('success', 'Nilai berhasil diubah!');
    }
}
