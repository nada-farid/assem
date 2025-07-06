<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class CourseStudentsImport implements ToCollection, WithHeadingRow
{
    protected $course;
    protected $association_id;
    protected $course_request_id;

    public $importedCount = 0;
    
    public function __construct(Course $course, $association_id, $course_request_id)
    {
        $this->course = $course;
        $this->association_id = $association_id;
        $this->course_request_id = $course_request_id;
    }

    public function collection(Collection $rows)
    {
        $allowedCount = $this->course->number_supported;
        $currentCount = CourseStudent::where('course_id', $this->course->id)->count();
        $imported = 0;

        foreach ($rows as $row) {
            if (($currentCount + $imported) >= $allowedCount) break;

            try {
                CourseStudent::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'identity_num' => $row['identity_number'],
                    'phone_number' => $row['phone'],
                    'date_of_birth' => $row['birth_date'],
                    'registered' => $row['registered'],
                    'certificate' => $row['certificate'],
                    'description' => $row['description'],
                    'relevance' => $row['relevance_identity'],
                    'attend_course' => $row['attend_course'],
                    'courses_before' => $row['courses_before'],
                    'transportaion' => $row['transportation'],
                    'prev_exper' => $row['prev_exper'],
                    'address' => $row['address'],
                    'request_certificate' => $row['request_certificate'] ?? 0,
                    'email_certificate' => $row['email_certificate'],
                    'course_id' => $this->course->id,
                    'association_id' => $this->association_id,
                    'course_request_id' => $this->course_request_id,
                ]);

                $imported++;
            } catch (\Exception $e) {
                Log::error("❌ خطأ أثناء حفظ المستفيد: " . $e->getMessage(), $row->toArray());
            }
        }

        $this->importedCount = $imported;
    }
}

            // if (($currentCount + $imported) >= $allowedCount) break;

            try {
        //  
                CourseStudent::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'identity_num' => $row['identity_number'],
                    'phone_number' => $row['phone'],
                    'date_of_birth' => $row['birth_date'],
                    'registered' => $row['registered'],
                    'certificate' => $row['certificate'],
                    'description' => $row['description'],
                    'relevance' => $row['relevance_identity'],
                    'attend_course' => $row['attend_course'],
                    'courses_before' => $row['courses_before'],
                    'transportaion' => $row['transportation'],
                    'prev_exper' => $row['prev_exper'],
                    'address' => $row['address'],
                    'request_certificate' => $row['request_certificate'] ?? 0,
                    'email_certificate' => $row['email_certificate'],
                    'course_id' => $this->course->id,
                    'association_id' => $this->association_id,
                    'course_request_id' => $this->course_request_id,
                ]);

                $imported++;
            } catch (\Exception $e) {
                Log::error("❌ خطأ أثناء حفظ المستفيد: " . $e->getMessage(), $row->toArray());
        
            }
        }
    }
}
