<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class AdminUserController extends Controller {
 public function index() { return User::select('id','username','role','created_at')->latest()->paginate(15); }
 public function updateRole(Request $request,User $user) { $data=$request->validate(['role'=>'required|in:admin,user']); abort_if($request->user()->id===$user->id && $data['role']!=='admin',422,'نمی‌توانید نقش مدیر خود را حذف کنید'); $user->update($data); return response()->json(['message'=>'نقش تغییر کرد','user'=>$user->only('id','username','role')]); }
 public function destroy(Request $request,User $user) { abort_if($request->user()->id===$user->id,422,'حذف حساب واردشده مجاز نیست'); $user->delete(); return response()->json(['message'=>'کاربر حذف شد']); }
}
