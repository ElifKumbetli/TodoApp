<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;


class AuthController extends Controller
{
    public function login(Request $request){

        if($request->method() =='GET'){
            return view('auth.login');
                    
         }
         //request:istek
         if($request->method()=='POST'){
             $data = $request->only('email','password' );
             if(Auth::attempt($data)){
                 //login success
                 return redirect()->route('tasks.index');             }
             else{
                 return redirect()->back()->with('login','Giriş işlemi başarısız');
             }
         }
    }


    //register:kayıt olmak
    public function register(Request $request){
        if($request->method() =='GET'){
            return view('auth.register');
        }else if($request->method() == 'POST'){
        $data = $request->only('name','email','password');
        $data['password'] = bcrypt($data['password']);
      
        User::create($data);

        return redirect(route('login'))->with('register' , 'Kayıt işlemi başarılı');
        }
    }

    public function logout(){
        Auth::logout(); // Kullanıcıyı çıkart
        return redirect(route('login'))->with('login','Oturum başarıyla kapatıldı.');
            
    }
    
}