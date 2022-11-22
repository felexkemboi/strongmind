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
         return [
             'First Name',
             'Last Name',
             'Other Name',
             'Region',
             'Languages',
             'Gender',
             'Patient ID',
             'Phone Number',
             'Age',
             'Staff',
             'D.O.B',
             'Marital Status',
             'Education Level',
             'District/City'
         ];
     }
}
