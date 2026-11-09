<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
  return Inertia::render('Home', [
    'pesan' => 'Halo dari Laravel lewat Inertia!',
  ]);
});
