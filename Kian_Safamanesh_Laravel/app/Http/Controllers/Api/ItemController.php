<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller {
 private function visible(Request $request) { $q=Item::with('owner:id,username'); return $request->user()->role==='admin'?$q:$q->where('owner_id',$request->user()->id); }
 public function index(Request $request) { return $this->visible($request)->latest()->paginate(10); }
 public function store(Request $request) {
  $data=$request->validate(['title'=>'required|string|max:150','description'=>'nullable|string','attachment'=>'nullable|file|mimes:pdf,png,jpg,jpeg,txt,docx|max:5120']);
  if($request->hasFile('attachment')) $data['attachment']=$request->file('attachment')->store('items','public');
  $data['owner_id']=$request->user()->id; return response()->json(Item::create($data),201);
 }
 public function show(Request $request, Item $item) { $this->authorizeItem($request,$item); return $item->load('owner:id,username'); }
 public function update(Request $request, Item $item) {
  $this->authorizeItem($request,$item);
  $data=$request->validate(['title'=>'sometimes|required|string|max:150','description'=>'nullable|string','attachment'=>'nullable|file|mimes:pdf,png,jpg,jpeg,txt,docx|max:5120']);
  if($request->hasFile('attachment')) { if($item->attachment) Storage::disk('public')->delete($item->attachment); $data['attachment']=$request->file('attachment')->store('items','public'); }
  $item->update($data); return response()->json($item->fresh());
 }
 public function destroy(Request $request, Item $item) { $this->authorizeItem($request,$item); if($item->attachment) Storage::disk('public')->delete($item->attachment); $item->delete(); return response()->json(['message'=>'آیتم حذف شد']); }
 private function authorizeItem(Request $request,Item $item): void { abort_unless($request->user()->role==='admin'||$item->owner_id===$request->user()->id,403,'دسترسی ندارید'); }
}
