<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;

// Ali Seyedi - fleet CRUD
class PlaneController extends Controller
{
    public function index()
    {
        $planes = Plane::all();
        return view('planes.index', compact('planes'));
    }

    public function create()
    {
        return view('planes.form', ['plane' => new Plane()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|string|max:100',
            'reg' => 'required|string|max:30|unique:planes,reg',
            'seats' => 'required|integer|min:1',
        ]);
        Plane::create($data);
        return redirect()->route('planes.index')->with('msg', 'Plane added');
    }

    public function edit(Plane $plane)
    {
        return view('planes.form', compact('plane'));
    }

    public function update(Request $request, Plane $plane)
    {
        $data = $request->validate([
            'model' => 'required|string|max:100',
            'reg' => 'required|string|max:30|unique:planes,reg,' . $plane->id,
            'seats' => 'required|integer|min:1',
        ]);
        $plane->update($data);
        return redirect()->route('planes.index')->with('msg', 'Plane updated');
    }

    public function destroy(Plane $plane)
    {
        if ($plane->flights()->count() > 0) {
            return back()->with('msg', 'This plane is used in a flight, delete the flight first');
        }
        $plane->delete();
        return redirect()->route('planes.index')->with('msg', 'Plane deleted');
    }
}
