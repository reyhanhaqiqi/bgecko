<?php

namespace App\Exports\Export;

use App\Models\Gecko;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GeckosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Gecko::all();
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
