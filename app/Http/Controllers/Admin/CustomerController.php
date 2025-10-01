<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $validatedData['avatar'] = '/avatars/'.$avatarName;
        }

        Customer::create($validatedData);

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($customer->avatar) {
                $oldAvatarPath = public_path(str_replace('/storage', '', $customer->avatar));
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            $avatarName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $validatedData['avatar'] = '/avatars/'.$avatarName;
        }

        $customer->update($validatedData);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Delete avatar
        if ($customer->avatar) {
            $avatarPath = public_path(str_replace('/storage', '', $customer->avatar));
            if (file_exists($avatarPath)) {
                unlink($avatarPath);
            }
        }
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
