<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaProduk extends Seeder
{
    public function run()
    {
        // Pakai locale Indonesia untuk nama orang & alamat
        $faker = Faker::create('id_ID');

        // --- SEEDER WARGA (50 Data) ---
        for ($i = 0; $i < 50; $i++) {
            DB::table('warga')->insert([
                'first_name' => $faker->firstName(),
                'last_name'  => $faker->lastName(),
                'birthday'   => $faker->date('Y-m-d', '2005-01-01'),
                // PAKAI MALE/FEMALE supaya tidak kena error "Data truncated"
                'gender'     => $faker->randomElement(['Male', 'Female']), 
                'email'      => $faker->unique()->safeEmail(),
                'phone'      => '08' . $faker->numerify('##########'),
                'umkm_id'    => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --- SEEDER PRODUK (100 Data) ---
        $kategori = ['Kripik', 'Sambal', 'Kopi', 'Rengginang', 'Batik', 'Madu', 'Kerupuk', 'Gula'];

        for ($i = 0; $i < 100; $i++) {
            // Gambar logo-umkm.png untuk 20 data pertama
$gambar = ($i < 20) ? 'assets-admin/img/produk/produk-' . ($i + 1) . '.JPG' : null;
            DB::table('produk')->insert([
                'nama_produk' => $faker->randomElement($kategori) . ' ' . $faker->word(),
                'deskripsi'   => 'Produk asli desa kualitas premium.',
                'harga'       => $faker->numberBetween(5, 50) * 1000,
                'stok'        => $faker->numberBetween(10, 100),
                'status'      => $faker->randomElement(['Tersedia', 'Habis']),
                'gambar'      => $gambar,
                'umkm_id'     => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}