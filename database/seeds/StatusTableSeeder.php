<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'status' => "Pemasok Mampu",
            'tgl_mulai' => Carbon::parse('2000-01-15'),
            'tgl_berakhir' => Carbon::parse('2001-01-15'),
            'keterangan' => "Vendor ini di suspend karena tidak dapat menyelesaikan pekerjaan",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);
    }
}
