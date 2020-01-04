<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PerizinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //table akta
         DB::table('aktas')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'jenis' => "Pendirian",
            'nama_notaris' => "Hotman Paris, SH",
            'nomor' => "06",
            'tgl_akta' => Carbon::parse('2000-01-15'),
            'filename' => "/dokumen/akta/",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

         DB::table('aktas')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'jenis' => "Perubahan",
            'nama_notaris' => "Hotmawati,SH",
            'nomor' => "02",
            'tgl_akta' => Carbon::parse('2000-01-15'),
            'filename' => "/dokumen/akta/",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

         DB::table('skkems')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'nomor_sk' => "12/SK.KEMENKUMHAM/2019",
            'tgl_sk' => Carbon::parse('2000-01-15'),
            'cur_modal_dasar' => "IDR",
            'modal_dasar' => 300000000,
            'cur_modal_disetor' => "IDR",
            'modal_disetor' => 200000000,
            'filename' => "akpe83128dsa3719237917239.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('siups')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'jenis_izin' => "SIUP",
            'no_dokumen' => "400/5828A/338.8.11/2016",
            'tgl_penerbitan' => Carbon::parse('2018-05-21'),
            'instansi_penerbit' => "Dinas Perizinan Kota Medan",
            'masa_berlaku_status' => "1",
            'berlaku_sampai' => Carbon::parse('2023-05-21'),
            'filename' => "siup83128dsa3719237917239.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('tdps')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'no_dokumen' => "TDP400/5828A/338.8.11/2016",
            'tgl_penerbitan' => Carbon::parse('2018-05-21'),
            'instansi_penerbit' => "Dinas Perizinan Kota Kisaran",
            'masa_berlaku_status' => "1",
            'berlaku_sampai' => Carbon::parse('2023-05-21'),
            'filename' => "siup83128dsa3719237917239.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('siujks')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'no_dokumen' => "SIUJK/5828A/338.8.11/2016",
            'tgl_penerbitan' => Carbon::parse('2019-05-21'),
            'instansi_penerbit' => "Dinas Perizinan Kota Tebing Tinggi",
            'masa_berlaku_status' => "1",
            'berlaku_sampai' => Carbon::parse('2024-05-21'),
            'filename' => "siujk83128dsa3719237917239.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('apis')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'no_dokumen' => "API/5828A/338.8.11/2016",
            'tgl_penerbitan' => Carbon::parse('2019-05-21'),
            'instansi_penerbit' => "Direktorat Jenderal Bea Cukai",
            'masa_berlaku_status' => "1",
            'berlaku_sampai' => Carbon::parse('2024-05-21'),
            'filename' => "api83128dsa3719237917239.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        
    }
}
