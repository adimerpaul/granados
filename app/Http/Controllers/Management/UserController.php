<?php

namespace App\Http\Controllers\Management;

use App\Role;
use App\User;
use App\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('modules.management.user.index')
                ->with('users', $users);
    }
    public function create(){

        $works = Work::all();
        

        if (count($works) > 0) {
            $roles = Role::all();
            return view('modules.management.user.create')
                    ->with('works', $works)
                    ->with('roles', $roles);
        }

        return redirect()->back();
    }

    public function store(Request $request){

        $work = Work::where('id', $request['work_id'])->first();
        
            
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'work_id' => ['required']
        ]);

        foreach ($work->users as $user) {
            if ($user->role_id == 4) {
                return redirect()->back();
            }
            if($user->role_id == 5){
                return redirect()->back();
            }
        }

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
            'work_id' => $request['work_id']
        ]);

        return redirect()->route('managements.users.index');
    }

    public function edit(User $user)
    {
        $works = Work::all();
        
        return view('modules.management.user.edit')
                ->with('user', $user)
                ->with('works', $works);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];

        if (!empty($request['password'])) 
        {
            $user->password = Hash::make($request['password']);
        }

        $user->save();

        return redirect()->route('managements.users.index');
    }

    public function destroy(User $user)
    {
        return redirect()->back();
    }
}
