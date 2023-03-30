<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem as ModelPostagem;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$array['postagens'] = ModelPostagem::get();
        $postsAtivas = ModelPostagem::where('ativa','S')->get();
        return view('public', ['posts'=>$postsAtivas]);
    }

    public function postagem($id)
    {

        $post = ModelPostagem::where('id', $id)->get();
        return view('public_post', ['post' => $post]);
    }
}
