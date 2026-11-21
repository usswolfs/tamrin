<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller {
 public function register(Request $request) {
  $data=$request->validate(['username'=>'required|string|min:3|max:50|unique:users','password'=>'required|string|min:8']);
  $user=User::create(['name'=>$data['username'],'email'=>$data['username'].'@example.test','username'=>$data['username'],'password'=>Hash::make($data['password']),'role'=>'user']);
  return response()->json(['user'=>$user,'token'=>$user->createToken('postman')->plainTextToken],201);
 }
 public function login(Request $request) {
  $data=$request->validate(['username'=>'required|string','password'=>'required|string']);
  $user=User::where('username',$data['username'])->first();
  if(!$user || !Hash::check($data['password'],$user->password)) throw ValidationException::withMessages(['username'=>['نام کاربری یا رمز عبور اشتباه است.']]);
  return response()->json(['user'=>$user,'token'=>$user->createToken('postman')->plainTextToken]);
 }
 public function me(Request $request) { return response()->json($request->user()); }
 public function logout(Request $request) { $request->user()->currentAccessToken()->delete(); return response()->json(['message'=>'خروج انجام شد']); }
}
