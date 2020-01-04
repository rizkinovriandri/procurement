<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FinancialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rekenings')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'no_rekening' => "02832983498",
            'pemegang_rekening' => "PT Terang Jaya",
            'nama_bank' => "BNI",
            'cabang' => "Gatot Subroto",
            'mata_uang' => "IDR",
            'filename' => "test.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        // DB::table('modals')->insert([
        //     //'id' => Str::random(10),
        //     'vendor_id' => 1,
        //     'cur_modal_dasar' => "IDR",
        //     'modal_dasar' => 300000000,
        //     'cur_modal_disetor' => "IDR",
        //     'modal_disetor' => 200000000,
            
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        //     //'email' => Str::random(10).'@gmail.com',
        //     //'password' => bcrypt('password'),
        // ]);

        DB::table('lapkeus')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'cur_nilai_asset' => "IDR",
            'nilai_asset' => 300000000,
            'cur_nilai_penjualan' => "IDR",
            'nilai_penjualan' => 200000000,
            'tahun' => 2018,
            'filename' => "test.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('perpajakans')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'jenis_dokumen' => "NPWP",
            'nomor_dokumen' => "12.23123.230932.349",
            'tahun' => 2018,
            'filename' => "test.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);
    }
}
