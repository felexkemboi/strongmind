<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ClientExport implements FromCollection,WithHeadings
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
         // Log::debug(collect($this->data));
         return [
             'First Name',
             'Last Name',
             'Other Name',
             'Region',
             'District',
             'City',
             'Languages',
             'Gender',
             'Patient ID',
             'Phone Number',
             'Age',
             'Staff',
             'D.O.B',
             'Marital Status',
             'Education Level'
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
