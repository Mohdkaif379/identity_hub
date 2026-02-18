<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CenterDetailsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $centers;
    protected int $rowNumber = 0;

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
            'KYC',
            'Created By (My Side)',
            'Created By',
            'Approved By',
            'IP Address',
            'Created At',
        ];
    }

    public function map($center): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $center->alias ?? '-',
            $center->ecn ?? '-',
            optional($center->doj)->format('Y-m-d') ?? '-',
            $center->centername ?? '-',
            $center->name ?? '-',
            $center->role ?? '-',
            $center->projectscode ?? '-',
            $center->crmid ?? '-',
            $center->email ?? '-',
            $center->gender ?? '-',
            $center->kyc_status ?? 'pending',
            $center->created_by_my_side ?? '-',
            $center->created_by ?? '-',
            $center->approved_by ?? '-',
            $center->ip_address ?? '-',
            optional($center->created_at)->format('Y-m-d H:i') ?? '-',
        ];
    }
}
