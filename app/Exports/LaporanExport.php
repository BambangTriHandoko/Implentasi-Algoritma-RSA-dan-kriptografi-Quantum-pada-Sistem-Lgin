<?php

namespace App\Exports;

use App\Laporan;
use App\PurchaseOrder;
use DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanExport implements FromCollection, WithHeadings, WithMapping 
{
    private $rowNumber = 0;

    private function getRowNumber(){
        $this->rowNumber++;
        return $this->rowNumber;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    //     User::selectRaw('users.name, count(*) submitted_games')
    // ->join('games', 'games.user_id', '=', 'users.id')
    // ->groupBy('users.name')
    // ->orderBy('submitted_games', 'DESC')
    // ->get();

        // $laporan = PurchaseOrder::selectRaw('no_invoice, tgl_invoice');
        // $laporan = DB::table('purchase_order')->select('id_purchase_order','nama_project as Project', 'customer as Customer', 'no_purchase_order as No PO', 'no_invoice as No Invoice','nominal_purchase_order', 'tgl_invoice as Tgl Invoice', 'progress as Status')->get();
        
        $pos = PurchaseOrder::all();
        Log::debug('Purchase orders: ' . $pos);
        
        $pos->map(function($po){
            $total_terbayar = $po->pembayaran->sum(function($bayar){
                return $bayar->jumlah_pembayaran;
            });
            Log::debug('Total terbayar: ' . $total_terbayar);
            $po['nomor'] = $this->getRowNumber();
            $po['sisa_pembayaran'] = $po['nominal_purchase_order'] - $total_terbayar;
            
        });
        Log::debug($pos);
        return $pos;
    }

    public function map($po): array{
        return [
            $po->nomor,
            $po->nama_project,
            $po->customer,
            $po->no_purchase_order,
            $po->no_invoice,
            $po->sisa_pembayaran,
            $po->tgl_invoice,
            $po->progress,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Project',
            'Customer',
            'No. PO',
            'No Invoice',
            'Jumlah Tagihan',
            'Tanggal Invoice',
            'Status'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // ... HERE YOU CAN DO ANY FORMATTING
                // Set A1:D4 range to wrap text in cells
                $event->sheet->getDelegate()->getStyle('A1:D4')
                    ->getAlignment()->setWrapText(true);
            },
        ];
    }
}
