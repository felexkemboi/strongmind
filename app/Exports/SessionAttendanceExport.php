<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SessionAttendanceExport implements FromCollection,WithHeadings
{
    private $data;
    private $headings;

    public function __construct($data)
    {
        $this->data = $data['data'];
        $this->headings = $data['headings'];
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
        return $this->headings;
     }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 50,
        ];
    }
}
