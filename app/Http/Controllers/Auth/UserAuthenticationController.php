<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthenticationRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthenticationController extends Controller
{



    public function login(UserAuthenticationRequest $request)
    {
    
 
       $user = User::where('email', $request->email)->first();
 
       if (!$user || !Hash::check($request->password, $user->password)) {
          return response('Login invalid', 503);
       }
 
       return response()->json([
            'user'=>$user,
            'token'=>$user->createToken($user)->plainTextToken,
       ]);
    }

    public function Register(UserRegisterRequest $request)
    {
    
      
       $user =new  User();
       $user->name=$request->input('name');
       $user->email=$request->input('email');
       $user->password= Hash::make( $request->input('password'));
       $user->save();
       return response()->json([
         'message'=>'user registered successfully',
         'user'=>$user,
         'token'=>$user->createToken($user)->plainTextToken,
      ]);
    }
 }

