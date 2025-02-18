<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request) {
        // xac thuc du lieu tu form dang ki 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|digits:10|unique:users,phone_number',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()){
            // return response()->json(['erors'=>$validator->errors()],422);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // luu vao csdl
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->telephone,
            'password' => Hash::make($request->password),
            'role' =>$request->role ??'user' , 
        ]);
        return redirect('/login')->with('success', 'User registered successfully. Please log in.');
    }
    public function login(Request $request) {
        $credentials = $request->only('telephone','password');
        //kiem tra thong tin dang nhap 
        if(Auth::attempt(['phone_number'=>$credentials['telephone'],'password'=>$credentials['password']])){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect('/admin')->with('success','');
            }
            return redirect('/home')->with('success', 'User login successfully');
        }
        // return response()->json(['error'=> 'Invalid'],401);
        // Trả về thông báo lỗi về phía frontend
        return redirect()->back()->with('error', 'Thông tin đăng nhập không đúng');
    }
}
