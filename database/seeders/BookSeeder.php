<?php

namespace Database\Seeders;
// Jangan lupa import Model Book
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
  // database/seeders/BookSeeder.php
  /* public function run(): void
  {
    $categories = Category::all();

    // Memastikan buku yang dibuat terdistribusi acak ke kategori yang sudah ada
    Book::factory(40)->make()->each(function ($book) use ($categories) {
      $book->category_id = $categories->random()->id;
      $book->save();
    });
  } */

  public function run(): void
  {
    // Kategori sudah dipasangkan dengan judul di BookFactory,
    // jadi tidak perlu lagi mengacak category_id di sini.
    // Pastikan CategorySeeder dijalankan lebih dulu.
    Book::factory(40)->create();
  }
}
