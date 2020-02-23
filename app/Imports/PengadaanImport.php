<?php

namespace App\Imports;

use App\Pengadaan;
use App\Rfx;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Carbon\Carbon;
use DateTime;

HeadingRowFormatter::default('none');

class PengadaanImport implements ToCollection, WithHeadingRow
{
    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function collection(Collection $rows)
    {
        $rfx_import = 1;
        foreach ($rows as $row) 
        {   
            if(!empty($row["PR No"])) {

            Pengadaan::create([
                'pr_no' => $row["PR No"],
                'pr_line' => $row['PR Line'],
                'shopping_cart' => $row['Shopping Chart No'],
                'pgr' => $row['PIC/Purch Grp'],
                'rfx' => $row['No RFX'],
                'transfer_date' => date('Y-m-d',strtotime(substr($row['Pr Transfer to SRM'],0,10))),
                'no_material' => $row['No Material'],
                'nama_material' => $row['Nama Material'],
                'quantity' => $row['Qty'],
                'uom' => $row['Unit'],
                'unit_price'=> $row['Unit Price'], 
                'total_budget'=> $row['PR Budget'],
                'pr_cur'=> $row['PR Currency'],
                'po_no'=> $row['PO No'],
                'po_line'=> $row['PO LIne'],
                'nego_start'=> $row['Negotiation Date Start'] ? $this->transformDate($row['Negotiation Date Start']) : null,
                'nego_to'=> $row['Negotiation Date End'] ? $this->transformDate($row['Negotiation Date End']) : null, 
                'clarification_start'=> $row['Clarification Spec Date Start'] ? $this->transformDate($row['Clarification Spec Date Start']) : null,
                'clarification_to'=> $row['Clarification Spec Date End'] ? $this->transformDate($row['Clarification Spec Date End']) : null, 
            ]);
            
                if( $rfx_import == 1 ) {
                    Rfx::create([
                        'rfx_no' => $row["No RFX"],
                        'rfx_title' => $row['RFX Title'],
                        'transaction_type' => $row['Transaction Type'],
                        'rfx_date' => $row['Tanggal RFX Created'] ? $this->transformDate($row['Tanggal RFX Created']) : null,
                        'sub_deadline' => $row['Batas Penawaran'] ? $this->transformDate($row['Batas Penawaran']) : null,
                        'tgl_opening' => date('Y-m-d',strtotime(substr($row['Opening Tender'],0,10))),
                        'sc_indicator' => $row['SC Indicator'],
                        'rfx_stat' => $row['RFX Stat'],
                        'te_start' => $row['TE Date Start'] ? $this->transformDate($row['TE Date Start']) : null,
                        'te_to' => $row['TE Date End'] ? $this->transformDate($row['TE Date End']) : null,
                    ]);
                    $rfx_import = 0;
                }
            }
        }

    }
    


    // public function model(array $row)
    // {
    //     return new Pengadaan([
    //         //
    //         // 'pr_no' => $row["PR No"],
    //         // 'pr_line' => $row['PR Line'],
    //         // 'shopping_cart' => $row['Shopping Chart No'],
    //         // 'pgr' => $row['PIC/Purch Grp'],
    //         // 'rfx' => $row['No RFX'],
    //         // 'transfer_date' => date('Y-m-d',strtotime(substr($row['Pr Transfer to SRM'],1,10))),
    //         // 'no_material' => $row['No Material'],
    //         // 'nama_material' => $row['Nama Material'],
    //         // 'quantity' => $row['Qty'],
    //         // 'uom' => $row['Unit'],
    //         // 'unit_price'=> $row['Unit Price'], 
    //         // 'total_budget'=> $row['PR Budget'],
    //         // 'pr_cur'=> $row['PR Currency'],
    //         // 'po_no'=> $row['PO No'],
    //         // 'po_line'=> $row['PO LIne'],
    //         // 'nego_start'=> Carbon::parse($row['Negotiation Date Start'])->format('Y-m-d H:i:s'),
    //         // 'nego_to'=> Carbon::parse($row['Negotiation Date End'])->format('Y-m-d H:i:s'),
    //         // 'clarification_start'=> Carbon::parse($row['Clarification Spec Date Start'])->format('Y-m-d H:i:s'),
    //         // 'clarification_to'=> Carbon::parse($row['Clarification Spec Date End'])->format('Y-m-d H:i:s'),

    //         'pr_no' => $row[1],
    //         'pr_line' => $row[2],
    //         'shopping_cart' => $row[3],
    //         'pgr' => $row[6],
    //         'rfx' => $row[0],
    //         'transfer_date' => date('Y-m-d',strtotime(substr($row[4],1,10))),
    //         'no_material' => $row[11],
    //         'nama_material' => $row[12],
    //         'quantity' => $row[13],
    //         'uom' => $row[14],
    //         'unit_price'=> $row[15], 
    //         'total_budget'=> $row[16],
    //         'pr_cur'=> $row[17],
    //         'po_no'=> $row[18],
    //         'po_line'=> $row[19],
    //         'nego_start'=> $this->transformDate($row[24]),
    //         'nego_to'=> $row[25],
    //         'clarification_start'=> $row[26],
    //         'clarification_to'=> $row[27],
    //     ]);

        
    // }

        
}
