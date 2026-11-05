<?php

namespace Database\Factories;

// Jangan lupa import Model Category
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
  // database/factories/BookFactory.php
  /* public function definition(): array
  {
    return [
      // Laravel otomatis menggunakan kategori yang ada / membuatkan jika belum ada
      'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
      'title'       => fake()->sentence(4),
      'author'      => fake()->name(),
      'isbn'        => fake()->unique()->isbn13(),
      'publisher'   => fake()->company(),
      'year'        => fake()->numberBetween(1990, 2024),
      'stock'       => fake()->numberBetween(1, 5),
      'cover'       => null,
      'description' => fake()->paragraph(2),
    ];
  } */

  public function definition(): array
  {
    // Judul, kategori, dan deskripsi diambil sepasang dari katalog di bawah,
    // jadi isinya selalu cocok (buku teknologi tidak nyasar ke kategori fiksi).
    // unique() mencegah judul yang sama muncul dua kali.
    $book = fake()->unique()->randomElement($this->catalog());

    $publishers = [
      'Penerbit Cahaya Aksara',
      'Pustaka Nusantara Baru',
      'Lentera Ilmu',
      'Aksara Mandala',
      'Gema Pustaka',
      'Bintang Terang Media',
      'Karya Cipta Buana',
      'Sinar Wacana',
    ];

    // Faker dengan locale Indonesia supaya nama penulis terdengar natural
    $id = fake('id_ID');

    return [
      // Cari kategori berdasarkan nama. Kalau tidak ketemu, pakai perilaku lama:
      // kategori acak yang ada / buatkan baru.
      'category_id' => Category::where('name', $book['category'])->value('id')
        ?? Category::inRandomOrder()->first()?->id
        ?? Category::factory(),
      'title'       => $book['title'],
      'author'      => $id->firstName() . ' ' . $id->lastName(),
      'isbn'        => fake()->unique()->isbn13(),
      'publisher'   => fake()->randomElement($publishers),
      'year'        => fake()->numberBetween(1990, 2024),
      'stock'       => fake()->numberBetween(1, 5),
      'cover'       => null,
      'description' => $book['description'],
    ];
  }

  /**
   * Katalog 40 buku (5 per kategori). Nama kategori harus sama persis
   * dengan yang ada di CategorySeeder.
   * Jumlah entri minimal sama dengan jumlah buku yang di-seed (Book::factory(40)).
   */
  private function catalog(): array
  {
    return [
      // Fiction
      ['title' => 'Senja di Ujung Dermaga', 'category' => 'Fiction', 'description' => 'Novel tentang persahabatan tiga sahabat nelayan yang dipertemukan kembali setelah sepuluh tahun merantau.'],
      ['title' => 'Rumah di Lereng Bukit', 'category' => 'Fiction', 'description' => 'Kisah sebuah keluarga yang berjuang mempertahankan rumah warisan di tengah perubahan zaman.'],
      ['title' => 'Surat untuk Hujan', 'category' => 'Fiction', 'description' => 'Kumpulan cerita pendek tentang rindu, kehilangan, dan hal-hal kecil yang jarang sempat dibicarakan.'],
      ['title' => 'Kota yang Tak Pernah Tidur', 'category' => 'Fiction', 'description' => 'Novel misteri tentang seorang jurnalis muda yang menyelidiki hilangnya arsip penting kota.'],
      ['title' => 'Perempuan di Balik Jendela Kayu', 'category' => 'Fiction', 'description' => 'Drama keluarga tiga generasi dengan latar kampung pesisir pada era 1980-an.'],

      // Non-Fiction
      ['title' => 'Merintis dari Nol', 'category' => 'Non-Fiction', 'description' => 'Catatan jatuh bangun membangun usaha dari warung kecil hingga memiliki belasan karyawan.'],
      ['title' => 'Kebiasaan Kecil, Hasil Besar', 'category' => 'Non-Fiction', 'description' => 'Panduan membangun kebiasaan harian yang konsisten tanpa mengandalkan motivasi sesaat.'],
      ['title' => 'Belajar dari Kegagalan', 'category' => 'Non-Fiction', 'description' => 'Kumpulan kisah nyata tokoh yang bangkit setelah gagal, beserta pelajaran yang bisa dipetik.'],
      ['title' => 'Mengelola Uang dengan Tenang', 'category' => 'Non-Fiction', 'description' => 'Pengantar keuangan pribadi untuk pemula: menabung, dana darurat, dan investasi dasar.'],
      ['title' => 'Jejak Langkah Seorang Guru Desa', 'category' => 'Non-Fiction', 'description' => 'Memoar seorang guru yang puluhan tahun mengabdi di sekolah terpencil.'],

      // Science
      ['title' => 'Mengenal Alam Semesta', 'category' => 'Science', 'description' => 'Pengantar astronomi populer tentang bintang, galaksi, dan cara ilmuwan mengamatinya.'],
      ['title' => 'Rahasia di Balik Sel', 'category' => 'Science', 'description' => 'Penjelasan sederhana tentang biologi sel dan cara tubuh makhluk hidup bekerja.'],
      ['title' => 'Fisika dalam Kehidupan Sehari-hari', 'category' => 'Science', 'description' => 'Fenomena fisika di sekitar kita, dari secangkir kopi panas hingga cara kerja lampu.'],
      ['title' => 'Bumi yang Berubah', 'category' => 'Science', 'description' => 'Membahas perubahan iklim, penyebabnya, dan dampaknya bagi kehidupan manusia.'],
      ['title' => 'Dunia Mikroskopis', 'category' => 'Science', 'description' => 'Menjelajahi mikroorganisme yang tak terlihat tetapi sangat memengaruhi kehidupan kita.'],

      // Technology
      ['title' => 'Pemrograman Web untuk Pemula', 'category' => 'Technology', 'description' => 'Pengantar HTML, CSS, dan JavaScript bagi yang ingin membuat website pertamanya.'],
      ['title' => 'Belajar Basis Data dengan MySQL', 'category' => 'Technology', 'description' => 'Konsep database relasional, query SQL, dan perancangan tabel lewat contoh kasus nyata.'],
      ['title' => 'Jaringan Komputer Praktis', 'category' => 'Technology', 'description' => 'Panduan memahami IP address, router, dan konfigurasi jaringan skala kecil.'],
      ['title' => 'Algoritma dan Logika Pemrograman', 'category' => 'Technology', 'description' => 'Melatih cara berpikir logis untuk memecahkan masalah sebelum mulai menulis kode.'],
      ['title' => 'Keamanan Digital untuk Semua', 'category' => 'Technology', 'description' => 'Tips melindungi akun, data pribadi, dan perangkat dari penipuan serta peretasan.'],

      // History
      ['title' => 'Nusantara dalam Lintasan Zaman', 'category' => 'History', 'description' => 'Ringkasan sejarah kepulauan dari masa kerajaan hingga era kemerdekaan.'],
      ['title' => 'Jalur Rempah dan Pelayaran Dunia', 'category' => 'History', 'description' => 'Kisah perdagangan rempah dan pengaruhnya terhadap hubungan antarbangsa.'],
      ['title' => 'Peradaban Awal Manusia', 'category' => 'History', 'description' => 'Dari masa berburu dan meramu hingga lahirnya kota dan tulisan pertama.'],
      ['title' => 'Perang Dunia dan Dampaknya bagi Asia', 'category' => 'History', 'description' => 'Peristiwa penting dua perang dunia serta pengaruhnya di kawasan Asia.'],
      ['title' => 'Tokoh-Tokoh Pembawa Perubahan', 'category' => 'History', 'description' => 'Profil singkat tokoh dari berbagai masa yang memengaruhi arah sejarah.'],

      // Philosophy
      ['title' => 'Berpikir Jernih', 'category' => 'Philosophy', 'description' => 'Pengantar logika dan cara menghindari kesalahan berpikir dalam kehidupan sehari-hari.'],
      ['title' => 'Etika dalam Keseharian', 'category' => 'Philosophy', 'description' => 'Persoalan baik dan buruk dalam situasi akrab: pekerjaan, pertemanan, dan keluarga.'],
      ['title' => 'Mencari Makna Hidup', 'category' => 'Philosophy', 'description' => 'Refleksi filosofis tentang tujuan hidup dari berbagai tradisi pemikiran.'],
      ['title' => 'Pengantar Filsafat Timur', 'category' => 'Philosophy', 'description' => 'Memperkenalkan gagasan utama pemikiran dari India, Tiongkok, dan Nusantara.'],
      ['title' => 'Seni Bertanya', 'category' => 'Philosophy', 'description' => 'Mengapa pertanyaan yang baik sama pentingnya dengan jawaban, disertai latihan reflektif.'],

      // Children
      ['title' => 'Kancil dan Sungai yang Hilang', 'category' => 'Children', 'description' => 'Dongeng bergambar tentang kancil yang mencari tahu ke mana perginya air sungai.'],
      ['title' => 'Petualangan Si Kecil di Kebun', 'category' => 'Children', 'description' => 'Cerita bergambar untuk mengenalkan tanaman dan hewan kecil kepada anak usia dini.'],
      ['title' => 'Aku Suka Berbagi', 'category' => 'Children', 'description' => 'Cerita pendek tentang persahabatan dan arti berbagi untuk anak usia sekolah dasar.'],
      ['title' => 'Belajar Angka Bersama Bulu', 'category' => 'Children', 'description' => 'Buku belajar berhitung 1 sampai 20 dengan tokoh kucing yang lucu.'],
      ['title' => 'Dongeng Sebelum Tidur', 'category' => 'Children', 'description' => 'Kumpulan cerita pendek yang menenangkan untuk dibacakan menjelang tidur.'],

      // Reference
      ['title' => 'Kamus Praktis Bahasa Indonesia', 'category' => 'Reference', 'description' => 'Daftar kata beserta makna dan contoh penggunaannya dalam kalimat.'],
      ['title' => 'Atlas Dunia Bergambar', 'category' => 'Reference', 'description' => 'Peta negara dan benua lengkap dengan informasi geografi singkat.'],
      ['title' => 'Ensiklopedia Pengetahuan Umum', 'category' => 'Reference', 'description' => 'Ribuan entri ringkas dari sains, sejarah, seni, hingga teknologi.'],
      ['title' => 'Kamus Inggris-Indonesia Saku', 'category' => 'Reference', 'description' => 'Berukuran saku, berisi kosakata penting beserta contoh kalimat.'],
      ['title' => 'Panduan Ejaan dan Tata Bahasa', 'category' => 'Reference', 'description' => 'Rujukan cepat untuk penulisan kata, tanda baca, dan kalimat efektif.'],
    ];
  }
}
