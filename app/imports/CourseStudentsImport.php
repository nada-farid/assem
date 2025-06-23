<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseStudentsImport implements ToCollection, WithHeadingRow
{
    protected $course;
    protected $association_id;

    public function __construct(Course $course, $association_id)
    {
        $this->course = $course;
        $this->association_id = $association_id;
    }

    public function collection(Collection $rows)
    {
        $allowedCount = $this->course->number_supported;
        $currentCount = CourseStudent::where('course_id', $this->course->id)->count();

        foreach ($rows as $index => $row) {
            if (($currentCount + $index) >= $allowedCount) {
                break;
            }

            CourseStudent::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'identity_num' => $row['identity_number'],
                'phone_number' => $row['phone'],
                // 'date_of_birth' =>$row['birth_date'],
                'registered' => $row['registered'],
                'certificate' => $row['certificate'],
                'description' => $row['description'],
                'relevance' => $row['relevance'],
                'attend_course' => $row['attend_course'],
                'transportaion' => $row['transportaion'],
                'prev_exper' => $row['prev_exper'],
                'address' => $row['address'],
                'request_certificate' => $row['request_certificate'] ?? 0,
                'email_certificate' => $row['email_certificate'],
                'course_id' => $this->course->id,
                'association_id' => $this->association_id,
            ]);
        }
    }
}
