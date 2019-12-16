<?php

use App\User;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    /**  
     * Restrict access to entire controller to logged in users only
     * */ 
    public function __construct() {
        $this->middleware('auth');
    }

     /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('users');
    }

    /**
     * Display the specified user.
     * ~User sent to view as an array of Users, to utilize the same blade file used for search results, for more DRY code.
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        return view('profile', ['user' => $user]);
        
    }
}
