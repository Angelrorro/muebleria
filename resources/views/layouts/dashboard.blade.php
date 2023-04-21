@extends('layouts.app')
<h1>Aqui va tu dashboard</h1>

<p>Hola: {{auth()->user()->email}}</p>