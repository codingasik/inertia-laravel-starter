<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
  return Inertia::render('Welcome', [
    'pesan' => 'Halo dari Laravel lewat Inertia!',
  ]);
});
