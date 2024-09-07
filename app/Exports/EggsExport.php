<?php

namespace App\Exports;

use App\Models\Egg;
use App\Models\Gecko;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EggsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Egg::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Tanggal Inkubasi',
            'Keterangan',
            'Perkawinan',
            'Deleted At',
            'Created At',
            'Updated At',
        ];
    }
}
