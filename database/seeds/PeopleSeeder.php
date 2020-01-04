<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //table akta
        DB::table('penguruses')->insert([
            //'id' => Str::random(10),
            'vendor_id' => 1,
            'nama' => "Rudianto, ST",
            'jabatan' => "Direktur",
            'no_telepon' => "061 7654878",
            'no_hp' => "061 7654878",
            'email' => "rudianto@terangjaya.com",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            //'email' => Str::random(10).'@gmail.com',
            //'password' => bcrypt('password'),
        ]);

    }
}
