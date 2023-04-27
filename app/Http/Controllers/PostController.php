<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $query=DB::table('dbo.articulo')->get();
        return view('header').view ('cartas',['listado'=>$query]);
    }
}
