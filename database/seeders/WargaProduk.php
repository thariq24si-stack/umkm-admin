<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaProduk extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        
        for ($i=0; $i<10; $i++) {
            DB::table('warga')->insert([
                'first_name' => $faker->firstName(),
                'last_name'  => $faker->lastName(),
                'birthday'   => $faker->date('Y-m-d', '2005-01-01'),
                'gender'     => $faker->randomElement(['Male','Female','Other']),
                'email'      => $faker->unique()->safeEmail(),
                'phone'      => $faker->phoneNumber(),
                'umkm_id'    => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        
        for ($i=10; $i<110; $i++) {
            DB::table('produk')->insert([
                'nama_produk' => $faker->word(),
                'deskripsi'   => $faker->sentence(),
                'harga'       => $faker->numberBetween(5000,500000),
                'stok'        => $faker->numberBetween(0,100),
                'status'      => $faker->randomElement(['Tersedia','Habis']),
                'umkm_id'     => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
