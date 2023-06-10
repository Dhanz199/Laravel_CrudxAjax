<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    function login()
    {
        $encodedUrl = base64_encode(url('/'));

        // Pass URL yang diencode ke view
        return view('auth.login', ['encodedUrl' => $encodedUrl]);
    }

    function proses_login(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('barang');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    function logout(Request $request)
    {
        $encodedUrl = base64_encode(url('/'));

        $decodedUrl = base64_decode($encodedUrl);
        // Pass URL yang diencode ke view
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->away($decodedUrl);
    }
}
