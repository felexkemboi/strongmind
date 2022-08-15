<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ClientExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return DB::table('clients')
            ->join('client_bio_data', 'clients.id', '=', 'client_bio_data.client_id')
            ->join('users', 'clients.staff_id', '=', 'users.id')
            ->get(array(
                'client_bio_data.first_name',
                'client_bio_data.last_name',
                'clients.patient_id',
                'clients.phone_number',
                'users.name',
                'clients.gender'
            ));
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
            'Patient ID',
            'Phone Number',
            'Staff Name',
            'Gender'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 45,
            'C' => 20,
            'D' => 20,
            'E' => 20,
        ];
    }
}
