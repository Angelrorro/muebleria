<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\
use DB;

class ListadoController extends Controller
{
    public function cartas(){
        $query=DB::table('dbo.articulo')->get();
        return view('header').view ('cartas',['listado'=>$query]);
    }
}