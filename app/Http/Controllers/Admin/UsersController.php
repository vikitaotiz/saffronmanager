<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }

        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $departments = \App\Department::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $departments = Department::all();


        return view('admin.users.create', compact('roles', 'departments'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        // dd($request->all());

        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        // $user = User::create($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        if ($request->departments) {
            $user->departments()->attach($request->departments);
        }

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }

        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $departments = \App\Department::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $departments = Department::all();

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles', 'departments'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;

        if ($request->departments) {
            $user->departments()->sync($request->departments);
        }

        $user->save();
    
        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        $departments = explode(', ', $user->department_id);

        foreach ($departments as $department) {

            $departmentz = json_decode($department);

            if(gettype($departmentz) == "integer"){

                $departs = str_split($departmentz);
            }

            else {
                $departs = $departmentz;
            }
        }

        return view('admin.users.show', compact('user' , 'departs'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
