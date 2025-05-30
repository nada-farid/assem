<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseBeneficiariesValidator implements ToCollection, WithHeadingRow
{
    public $errors;
    public $validRows;

    public function __construct()
    {
        $this->errors = new MessageBag();
        $this->validRows = collect();
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            $rowNumber = $index + 2;
            $rowErrors = [];

            if (empty($row['name'])) {
                $rowErrors[] = "حقل (الاسم) فارغ";
            }

            if (empty($row['identity_number'])) {
                $rowErrors[] = "حقل (رقم الهوية) فارغ";
            } elseif (!preg_match('/^\d{10}$/', $row['identity_number'])) {
                $rowErrors[] = "رقم الهوية يجب أن يكون 10 أرقام";
            }

            if (!empty($rowErrors)) {
                $this->errors->add("row_$rowNumber", "الصف $rowNumber: " . implode('، ', $rowErrors));
            } else {
                $this->validRows->push($row);
            }
        }
    }
}
