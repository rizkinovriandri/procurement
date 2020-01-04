<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            //'id' => Str::random(10),
            'id' => 3,
            'nama' => "mitra 10",
            'badan_usaha' => "PT",
            'alamat' => "Komp. Medan Business Point, Jl. Gatot Subroto No. 45",
            'kota' => "Medan",
            'negara' => "Indonesia",
            'kode_pos' => "20243",
            'jenis_kantor' => "utama",
            'telepon1' => "061 4566321",
            'telepon2' => "061 9839493",
            'fax' => "061 4566322",
            'email' => "mitra10@yahoo.com",
            'type' => "Barang",
            'website' => "www.mitra10.com",
            'k3l' => 0,
            'hubungan_keluarga' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);
    
        DB::table('aktas')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 3,
            'jenis' => "Pendirian",
            'nama_notaris' => "Mary Jane, SH",
            'nomor' => "06",
            'tgl_akta' => Carbon::parse('2000-01-15'),
            'filename' => "190a4bf82d0e3b4b136896b83878be32.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('aktas')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 3,
            'jenis' => "Perubahan",
            'nama_notaris' => "Mary Jane, SH",
            'nomor' => "10",
            'tgl_akta' => Carbon::parse('2000-01-15'),
            'filename' => "99651cbb7a3d63fbe69371f2e3d7a236.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

		
    
    }
}
