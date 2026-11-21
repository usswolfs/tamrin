<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

// Ali Seyedi - customer CRUD
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.form', ['customer' => new Customer()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);
        Customer::create($data);
        return redirect()->route('customers.index')->with('msg', 'Customer added');
    }

    public function edit(Customer $customer)
    {
        return view('customers.form', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);
        $customer->update($data);
        return redirect()->route('customers.index')->with('msg', 'Customer updated');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('msg', 'Customer deleted');
    }
}
