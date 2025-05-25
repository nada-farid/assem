<?php

namespace App\Imports;

use App\Models\Beneficiary;
use App\Models\User;
use App\Models\CourseRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseBeneficiariesImport implements ToCollection, WithHeadingRow
{
    protected $courseRequest;

    public function __construct(CourseRequest $courseRequest)
    {
        $this->courseRequest = $courseRequest;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::firstOrCreate(
                ['email' => $row['email']],
                [
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => 'client',
                'approved' => 1,
                'user_type' => 'beneficiar',
            ]);
            $beneficiary = Beneficiary::firstOrCreate(
                ['identity_number' => $row['identity_number']],
                [

                    'identity_number' => $row['identity_number'],
                    'gender' => $row['gender'],
                    // 'birth_date' => $row['birth_date'],
                    'address' => $row['address'],
                    'user_id' => $user->id,
                    'phone' => $row['phone'],
                ]
            );

            $this->courseRequest->beneficiaries()->syncWithoutDetaching([$beneficiary->id]);
        }
    }
}
