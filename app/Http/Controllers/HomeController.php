<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use app\Role;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->user()->authorizeRoles(['employee', 'manager']))

        // return view('home');
        if ($request->user()->hasRole('manager'))
        {
            // dd("login");
            return view('manager.home')->with('status', "Login success!!!");
        }
        elseif ($request->user()->hasRole('employee'))
        {
            return view('employee.home')->with('status', "Login success!!!");
        }
        else 
        {
            return redirect('awal');
        }
    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles('manager');

        return view(‘some.view’);
    }
    */
    
    }
    /**
     * Create a new controller instance.
     * 
     * @return void
     */

    public function getUsers(Request $request)
    {
        if ($request->user()->hasRole('manager')) {
        $users = User::all();
        return view('users', compact('users'));
        } else {
            return redirect()->route('employee.index');
        }
    }

    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    
    public function updateUser(Request $request)
    {
        User::find($request->pk)->update([$request->name => $request->value]);
        return response()->json(['success'=>'done']);
    }

    public function deleteUser($id)
    {
        User::destroy($id); 
        Session::flash("notice", "User successfully deleted");
        return redirect() -> route('get-users');
        
    }
}
