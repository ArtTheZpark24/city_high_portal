<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $loginFields = $request->validate([
            'l-email' => 'required',
         'l-password' => 'required'
        ]);

        if(auth()->guard(name: 'student')->attempt([
            'email' => $loginFields['l-email'],
            'password'=> $loginFields['l-password']
        ])){

            $request->session()->regenerate();

            return redirect('/');
            



            
        }
        return redirect('/')
        ->withInput($request->only('l-email')) // Keep the entered email in the input field.
        ->withErrors(['loginError' => 'Invalid email or password. Please try again.']);
        if(auth()->guard(name: 'student')->check()){
            return redirect('/dashboard');
        }
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
    public function store(StoreStudentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        //
    }
    
}
