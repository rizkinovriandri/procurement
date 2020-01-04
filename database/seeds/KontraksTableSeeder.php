<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KontraksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kontraks')->insert([
            
            'po_no' => "4000007627",
            'judul' => "Spare part mechanical",
            'po_type' => "GOODS",
            'metode' => "Pemilihan Langsung",
            'count_of_item' => 2,
            'tahun' => 2019,
            'po_date' => Carbon::parse('2019-07-15'),
            'currency' => "IDR",
            'nilai_kontrak' => 300000000,
            'vendor' => "110046",

        ]);
    }
}
