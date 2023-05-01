<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Return the login view.
     */
    public function index(){
        return view('pages.auth.login');
    }

    /**
     * Redirect the user to the Google authentication page.
     */
    public function googleRedirect(){
        return Socialite::driver('google')
            ->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function googleCallback(){
        $user = Socialite::driver('google')->user();

        if($user != null){
            /**
             * Faz a checagem se o usuário já existe no banco de dados
             * se existir, faz o login
             * se não existir, cria o usuario redireciona para tela de cadastro complementar
             * apos o cadastro complementar, redireciona para a tela de dashboard
             */

             return redirect()->route('dashboard');
        }

        return redirect()->route('auth.login');
    }


    /**
     * Redirect the user to the Facebook authentication page.
     */
    public function facebookRedirect(){
        return Socialite::driver('facebook')
            ->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     */
    public function facebookCallback(){
        $user = Socialite::driver('facebook')->user();
        if($user != null){
            /**
             * Faz a checagem se o usuário já existe no banco de dados
             * se existir, faz o login
             * se não existir, cria o usuario redireciona para tela de cadastro complementar
             * apos o cadastro complementar, redireciona para a tela de dashboard
             */

             return redirect()->route('dashboard');
        }

        return redirect()->route('auth.login');
    }

}
