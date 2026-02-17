<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CenterDetailsExport implements FromCollection, WithHeadings
{
    protected $centers;

    public function __construct($centers)
    {
        $this->centers = $centers;
    }

    public function collection()
    {
        return $this->centers;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Alias',
            'ECN',
            'DOJ',
            'Center Name',
            'Name',
            'Role',
            'Projects Code',
            'CRM ID',
            'Email',
            'Gender',
            'KYC Status',
            'Created By (My Side)',
            'Created By',
            'Approved By',
            'Generate Link ID',
            'IP Address',
            'Created At',
            'Updated At'
        ];
    }
}
