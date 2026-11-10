<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
  return Inertia::render('Home', [
    'title' => 'Library System',
    'message' => 'Halo dari Laravel lewat Inertia!',
  ]);
});
