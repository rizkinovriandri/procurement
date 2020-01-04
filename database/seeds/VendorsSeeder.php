<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat sample vendor1
		$vendor = new Vendor();
		$vendor->nama = 'Terang Jaya';
		$vendor->badan_usaha = 'PT';
		$vendor->alamat = 'Komp. Medan Business Point, Jl. Gatot Subroto No. 45';
		$vendor->kota = 'Medan';
		$vendor->negara = 'Indonesia';
		$vendor->kode_pos = '20245';
		$vendor->jenis_kantor = 'utama';
		$vendor->telepon1 = '061 4566321';
		$vendor->telepon2 = '';
		$vendor->fax = '';
		$vendor->email = 'terangjaya@yahoo.com';
		$vendor->type = 'Barang';
		$vendor->website = 'www.terangjaya.com';
		$vendor->k3l = '0';
		$vendor->hubungan_keluarga = '1';
		$vendor->nama_keluarga = 'Muliono';
		$vendor->save();

		// Membuat sample vendor1
		$vendor = new Vendor();
		$vendor->nama = 'Mulia Jaya Inti';
		$vendor->badan_usaha = 'PT';
		$vendor->alamat = 'Jl. H. Adam Malik No. 56 A';
		$vendor->kota = 'Jakarta';
		$vendor->negara = 'Indonesia';
		$vendor->kode_pos = '10876';
		$vendor->jenis_kantor = 'utama';
		$vendor->telepon1 = '021 564467';
		$vendor->telepon2 = '081308765641';
		$vendor->fax = '021 456712';
		$vendor->email = 'sales@muliajayainti.com';
		$vendor->type = 'Jasa';
		$vendor->website = 'www.muliajayainti.co.id';
		$vendor->k3l = '1';
		$vendor->hubungan_keluarga = '0';
		$vendor->nama_keluarga = '';
		$vendor->save();
    }
}
