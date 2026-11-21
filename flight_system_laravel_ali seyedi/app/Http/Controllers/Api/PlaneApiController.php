<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plane;
use Illuminate\Http\Request;

// Ali Seyedi - fleet API
class PlaneApiController extends Controller
{
    public function index()
    {
        return Plane::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|string|max:100',
            'reg' => 'required|string|max:30|unique:planes,reg',
            'seats' => 'required|integer|min:1',
        ]);
        return response()->json(Plane::create($data), 201);
    }

    public function show(Plane $plane)
    {
        return $plane;
    }

    public function update(Request $request, Plane $plane)
    {
        $data = $request->validate([
            'model' => 'sometimes|string|max:100',
            'reg' => 'sometimes|string|max:30|unique:planes,reg,' . $plane->id,
            'seats' => 'sometimes|integer|min:1',
        ]);
        $plane->update($data);
        return $plane;
    }

    public function destroy(Plane $plane)
    {
        if ($plane->flights()->count() > 0) {
            return response()->json(['message' => 'Plane is used in a flight'], 409);
        }
        $plane->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
