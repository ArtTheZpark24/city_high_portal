<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Http\Requests\StoreTeachersRequest;
use App\Http\Requests\UpdateTeachersRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teachers.login');
    }
    public function login(Request $request){

        $loginFields = $request->validate([
           'l-email' => 'required|email',
           'l-password'=> 'required'
        ],
        [
            'l-email.required' => 'Please enter an email address',
            'l-email.email' => 'Please enter a valid email address',
            'l-password.required' => 'Please enter a password'
        ]
    
    ); 
    if(auth()->guard('teacher')->attempt([
       'email' => $loginFields['l-email'],
       'password' => $loginFields['l-password']

    ])){

        $request->session()->regenerate();

        return redirect('teachers-dashboard');
    }
       return redirect('/teachers')
       ->withInput($request->only('l-email'))
       ->withErrors(['loginError' => 'Invalid email or password please try again']);
    }
public function dashboard(){
    return view('teachers.dashboard');
}
public function logout(){
    
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeachersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teachers $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeachersRequest $request, Teachers $teachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teachers)
    {
        //
    }
}
