<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Str;
use Carbon\Carbon;
class Rolecontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //to show add form
    function addform(){
        $all_role = Role::all();
        return view('role.add',compact('all_role'));
    }

    function storerole(Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        // print_r($request->all());
        $role = Str::lower($request->role);
        if(Role::Where('role','=',$role)->doesntExist()){
            Role::insert([
                'role' => $role,
                'created_at' => Carbon::now(),
            ]);
        }else{
            return back()->with("inserr","Already Inserted");
        }
        return back();
    }
}
