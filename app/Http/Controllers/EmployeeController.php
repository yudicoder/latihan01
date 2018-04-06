<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.home');
    }
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:employee');
    }
}
