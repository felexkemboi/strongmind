<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ResponseExport implements FromCollection,WithHeadings
{

    protected $data;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function collection()
    {
        return collect($this->data);
    }

    /**
     * Write code on Method
     *
     * @return response()
      */
    public function headings() :array
     {
        return [
            'Question',
            'Client',
            'Group',
            'Form',
            'Value',
            'Status',
            'Score'
        ];
     }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 15,
            'C' => 20,
            'D' => 15,
            'E' => 20,
        ];
    }
}
