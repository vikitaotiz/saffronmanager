<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentMessagesController extends Controller
{
    public function show($id)
    {
        $department = Department::find($id);

        // dd($department->id);

        $departments = Department::all();

        return view('messenger.dept_show', compact('department', 'departments'));
    }
}
