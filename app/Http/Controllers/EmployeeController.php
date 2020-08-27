<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Auth::user()->is_admin)
            return back()->with('status', 'You have to permission!');

    	$employee = User::where('is_admin',0)->get();
    	return view('admin.employee.list',compact('employee'));
    }

    public function create()
    {
        if(!Auth::user()->is_admin)
            return back()->with('status', 'You have to permission to create Employee!');

    	return view('admin.employee.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $request['password'] = bcrypt($request->password);

        $inputs = $request->except(['_token','password_confirmation']);

        User::insert($inputs);

        return redirect('employee/create')->with('status', 'Employee Created Successfully!');
    }

    public function show($id)
    {
        # code...
    }

    public function edit($id)
    {
        $employee = User::find($id);

        return view('admin.employee.edit',compact('employee'));

    }

    public function profileEdit()
    {
        $id = Auth::id();

        $employee = User::find($id);

        return view('admin.employee.edit',compact('employee'));

    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = User::find($id);

        $inputs = $request->except(['_token']);

        if(!Auth::user()->is_admin)
            $inputs = $request->except(['_token','salary']);

        $employee->update($inputs);

        return back()->with('status', 'Employee Updated Successfully!');
    }

    public function destroy($id)
    {
        $employee = User::find($id);

        $employee->delete();

        return redirect('employee')->with('status', 'Employee Deleted Successfully!');
    }
}
