<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TechnicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tenagaahli')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'nama' => "Arifin Santoso, ST",
            'pendidikan' => "S1",
            'keahlian' => "Teknik Sipil",
            'pengalaman' => "5",
            'status' => "Permanen",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('sertifikats')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'type' => "Mutu",
            'nomor' => "LS23919-2313",
            'nama' => "Sertifikat ISO 90001:2015",
            'instansi_penerbit' => "SGS",
            'tgl_terbit' => Carbon::parse('2000-01-15'),
            'tgl_kadaluarsa' => Carbon::parse('2001-01-15'),
            'filename' => "test.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('fasilitases')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'nama_peralatan' => "Forklift",
            'spesifikasi' => "Komatsu 2013",
            'jumlah' => 3,
            'tahun_pembuatan' => 2015,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('pengalamans')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'nama_pelanggan' => "PT United Traktor",
            'nama_pekerjaan' => "Overhaul Crane 10 T",
            'keterangan' => "Pekerjaan ini merupakan pekerjaan overhaul crane dengan kapasitas 10 Ton yang digunakan untuk operasional di proyek pertambangan",
            'cur_nilai_proyek' => "USD",
            'nilai_proyek' => 2000000000,
            'nomor_kontrak' => "4000000378",
            'tgl_mulai_proyek' => Carbon::parse('2017-01-15'),
            'tgl_selesai_proyek' => Carbon::parse('2018-01-15'),
            'contact_person' => "Johnson Sitorus",
            'no_contact_person' => "0852 6327 8732",
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('keagenans')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'nama_principle' => "SKF",
            'jenis_barang' => "Bearing, Roller",
            'tgl_berlaku_mulai' => Carbon::parse('2000-01-15'),
            'tgl_berlaku_sampai' => Carbon::parse('2001-01-15'),
            'filename' => "test.pdf",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('sub_barang')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'sub_bidang' => "Mekanikal",
            'nama_barang' => "Pump, Submersible",
            'merk' => "Hitachi",
            'sumber' => "Import",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

        DB::table('sub_jasa')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 2,
            'sub_bidang' => "Jasa Sipil Umum",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

    }
}
