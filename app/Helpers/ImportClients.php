<?php
   namespace App\Helpers;
   use Maatwebsite\Excel\Concerns\ToArray;
   use Illuminate\Support\Facades\Validator;

   class ImportClients implements ToArray 
   {
      private $data;
   
      public function __construct()
      {
         $this->data = [];
      }

      public function array(array $rows)
      {
         array_shift($rows);
         foreach ($rows as $row) {
               $this->data[] = array(
                  'name' => $row[0], 
                  'gender' => strval($row[1]),
                  'phone_number' => $row[2],
                  'country_id' => (int)$row[3],
                  'region' => $row[4],
                  'city' => strval($row[5]),
                  'timezone_id' => (int)$row[6],
                  'age' => (int)$row[7],
                  'status_id' => (int)$row[8],
                  'channel_id' => (int)$row[9],
                  'languages' => $row[10]
               );
         }
      }
   
      public function getArray(): array
      {
         return $this->data;
      }

      public function validate($user)
      {
         $validator = Validator::make($user, [
            'name' => 'required|string|min:3|max:60|unique:clients',
            'gender' => 'required|string|in:Male,Female',
            'phone_number' => 'required|numeric|unique:clients', //min:10|max:13
            'country_id' => 'required|integer|exists:countries,id',
            'region' => 'required|string|min:3|max:20',
            'city' => 'required|string|min:3|max:20',
            'timezone_id' => 'required|integer|exists:timezones,id',
            'age' => 'required|integer|not_in:0', //TODO specify if over 18 or above some particular age
            'status_id' => 'required|exists:statuses,id|integer',
            'channel_id' => 'required|integer|exists:channels,id',
            'languages' => 'required|string|min:3|max:30'
        ]);

        return $validator;
      }
   }