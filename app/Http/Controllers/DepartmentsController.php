<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use jazmy\FormBuilder\Models\Form;
use Auth;
use App\User;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('admin.departments.index')->with(['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Department::where('name', '=', $request->name)->exists()) {
            return redirect()->back()->with('error', 'This Department Already Exists!');
        }

        $this->validate($request, [
            'name' => 'required'
        ]);

        $department = new Department;

        $department->name = $request->name;
        $department->description = $request->description;

        $department->user_id = Auth::user()->id;

        $department->save();

        return redirect('admin/departments')->with('success', 'Department Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $department = Department::find($id);

        $users = $department->users;

        return view('admin.departments.show')
                ->with(['department' => $department, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        return view('admin.departments.edit')->with(['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $department->name = $request->name;

        $department->description = $request->description;

        $department->save();

        return redirect()->route('admin.departments.show', $department->id)->with('success', 'Department Updated Successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        $department->delete();

        return redirect('admin/departments')->with('success', 'Department Deleted Successfully');;

    }

    public function show_dpt($id)
    {
        $department = Department::find($id);

        $forms = $department->forms;

        $users = $department->users;

        return view('reports.show_dpt', compact('department', 'forms', 'users'));
    }

    public function show_form($id)
    {
        $form = Form::find($id);

        $users = User::all();

        $submissions = $form->submissions;

        return view('reports.show_form', compact('form', 'submissions', 'users'));
    }
    
}
