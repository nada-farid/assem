<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseStudentValidator implements ToCollection, WithHeadingRow
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

            // ✅ التحقق من الأعمدة الأساسية
            if (empty($row['name'])) {
                $rowErrors[] = "حقل الاسم فارغ";
            }

            if (empty($row['identity_number'])) {
                $rowErrors[] = "رقم الهوية فارغ";
            } elseif (!preg_match('/^\d{10}$/', $row['identity_number'])) {
                $rowErrors[] = "رقم الهوية يجب أن يكون 10 أرقام";
            }

            if (empty($row['phone'])) {
                $rowErrors[] = "رقم الجوال فارغ";
            }

            if (!empty($row['email']) && !filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                $rowErrors[] = "البريد الإلكتروني غير صالح";
            }

            if (!empty($row['birth_date']) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $row['birth_date'])) {
                $rowErrors[] = "تاريخ الميلاد يجب أن يكون بالصيغة yyyy-mm-dd";
            }

            if (!in_array($row['registered'], ['yes', 'no'])) {
                $rowErrors[] = "قيمة 'registered' يجب أن تكون yes أو no";
            }

            if (!in_array($row['certificate'], ['yes', 'no'])) {
                $rowErrors[] = "قيمة 'certificate' يجب أن تكون yes أو no";
            }

            if (!in_array($row['transportation'], ['yes', 'no'])) {
                $rowErrors[] = "قيمة 'transportation' يجب أن تكون yes أو no";
            }

            if (isset($row['request_certificate']) && !in_array($row['request_certificate'], [0, 1, '0', '1'])) {
                $rowErrors[] = "قيمة 'request_certificate' يجب أن تكون 0 أو 1";
            }

           
            if (!empty($rowErrors)) {
                $this->errors->add("row_$rowNumber", "الصف $rowNumber: " . implode('، ', $rowErrors));
            } else {
               
                $this->validRows->push($row);
            }
        }
    }
}
