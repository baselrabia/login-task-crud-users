<?php

namespace App\Http\Controllers;

use App\User;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $User)
    {
        return $User->render('admin.users.index',['title'=>  'users']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['title' => 'Add'." ".'User']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),
			[
                'name'     => 'required',
				'email'    => 'required|email|unique:users',
				'password' => 'required|min:6'
			], [], [
				'name'     => 'name',
				'email'    => 'email',
				'password' => 'password',
			]);
		$data['password'] = bcrypt(request('password'));
		User::create($data);
		session()->flash('success', 'record_added');
		return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
		$title = 'edit';
		return view('admin.users.edit', compact('user', 'title'));
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
        $data = $this->validate(request(),
        [
                'name'     => 'required',
				'email'    => 'required|email|unique:users,email,'.$id,
				'password' => 'sometimes|nullable|min:6'
			], [], [
				'name'     => 'name',
				'email'    => 'email',
				'password' => 'password',
        ]);
        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id', $id)->update($data);
        session()->flash('success', 'updated_record');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
		session()->flash('success', 'deleted_record');
		return redirect('users');
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			User::destroy(request('item'));
		} else {
			User::find(request('item'))->delete();
		}
		session()->flash('success', 'deleted_record');
		return redirect('users');
	}
}
