<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Contracts\AuthInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authRepository;

    public function __construct(AuthInterface $authRepository) {
        $this->authRepository = $authRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login.login");
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
    public function store(AuthRequest $request)
    {
   
        $data = $this->authRepository->login($request->validated());
        
        if ($data) {
            return redirect()->route('home.index')->with('success', 'Login Successfully'); 
        } else {
            return redirect()->route('login.index')->with('error', 'Invalid Credentials');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
