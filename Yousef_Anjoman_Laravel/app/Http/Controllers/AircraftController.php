<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AircraftController extends Controller
{
    public function index()
    {
        $aircraft = Aircraft::latest()->paginate(10);
        return view('aircraft.index', compact('aircraft'));
    }

    public function create()
    {
        return view('aircraft.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'registration_number' => ['required', 'string', 'max:30', 'unique:aircraft,registration_number'],
            'model' => ['required', 'string', 'max:100'],
            'manufacturer' => ['required', 'string', 'max:100'],
            'capacity' => ['required', 'integer', 'min:1', 'max:1000'],
            'status' => ['required', Rule::in(['active', 'maintenance', 'inactive'])],
        ]);
        Aircraft::create($data);
        return redirect()->route('aircraft.index')->with('success', 'هواپیما با موفقیت ثبت شد.');
    }

    public function edit(Aircraft $aircraft)
    {
        return view('aircraft.edit', compact('aircraft'));
    }

    public function update(Request $request, Aircraft $aircraft)
    {
        $data = $request->validate([
            'registration_number' => ['required', 'string', 'max:30', Rule::unique('aircraft')->ignore($aircraft->id)],
            'model' => ['required', 'string', 'max:100'],
            'manufacturer' => ['required', 'string', 'max:100'],
            'capacity' => ['required', 'integer', 'min:1', 'max:1000'],
            'status' => ['required', Rule::in(['active', 'maintenance', 'inactive'])],
        ]);
        $aircraft->update($data);
        return redirect()->route('aircraft.index')->with('success', 'اطلاعات هواپیما ویرایش شد.');
    }

    public function destroy(Aircraft $aircraft)
    {
        if ($aircraft->flights()->exists()) {
            return back()->with('error', 'برای حذف این هواپیما ابتدا پروازهای مرتبط را حذف یا به هواپیمای دیگری منتقل کنید.');
        }
        $aircraft->delete();
        return redirect()->route('aircraft.index')->with('success', 'هواپیما حذف شد.');
    }
}
