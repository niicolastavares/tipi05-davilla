<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        return view('admin.auth.login');
        
    }
    
    public function autenticar(Request $request)
    {

        $request->validate([
            'email_usuario' => 'required|email',
            'senha_usuario' => 'required',
        ]);

        // Credenciais necessárias para o USER/FUNCIONÁRIO logar
        $user = [
            'email_usuario' => $request->email_usuario,
            'password' => $request->senha_usuario,
            'status_usuario' => 'ATIVO',
        ];

        if(Auth::guard('admin')->attempt($user, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->route('admin.dash');
        }

        return back()->withInput()->with('error', 'Email ou senha inválidos');
    }

    public function logout()
    {

        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
