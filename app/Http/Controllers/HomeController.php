<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use App\Events\NewPost;
use App\Events\EventSocket;
use App\Events\Notificacion;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notify(User $user)
    {
        Notificacion::dispatch($user);
    }

    public function room($id)
    {
        return view('welcome', compact('id'));
    }
}
