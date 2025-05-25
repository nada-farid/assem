<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'setting_create',
            ],
            [
                'id'    => 18,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'setting_show',
            ],
            [
                'id'    => 20,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'slider_create',
            ],
            [
                'id'    => 23,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 24,
                'title' => 'slider_show',
            ],
            [
                'id'    => 25,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 26,
                'title' => 'slider_access',
            ],
            [
                'id'    => 27,
                'title' => 'course_create',
            ],
            [
                'id'    => 28,
                'title' => 'course_edit',
            ],
            [
                'id'    => 29,
                'title' => 'course_show',
            ],
            [
                'id'    => 30,
                'title' => 'course_delete',
            ],
            [
                'id'    => 31,
                'title' => 'course_access',
            ],
            [
                'id'    => 32,
                'title' => 'courses_management_access',
            ],
            [
                'id'    => 33,
                'title' => 'category_create',
            ],
            [
                'id'    => 34,
                'title' => 'category_edit',
            ],
            [
                'id'    => 35,
                'title' => 'category_show',
            ],
            [
                'id'    => 36,
                'title' => 'category_delete',
            ],
            [
                'id'    => 37,
                'title' => 'category_access',
            ],
            [
                'id'    => 38,
                'title' => 'center_create',
            ],
            [
                'id'    => 39,
                'title' => 'center_edit',
            ],
            [
                'id'    => 40,
                'title' => 'center_show',
            ],
            [
                'id'    => 41,
                'title' => 'center_delete',
            ],
            [
                'id'    => 42,
                'title' => 'center_access',
            ],
            [
                'id'    => 43,
                'title' => 'curriculum_create',
            ],
            [
                'id'    => 44,
                'title' => 'curriculum_edit',
            ],
            [
                'id'    => 45,
                'title' => 'curriculum_show',
            ],
            [
                'id'    => 46,
                'title' => 'curriculum_delete',
            ],
            [
                'id'    => 47,
                'title' => 'curriculum_access',
            ],
            [
                'id'    => 48,
                'title' => 'news_create',
            ],
            [
                'id'    => 49,
                'title' => 'news_edit',
            ],
            [
                'id'    => 50,
                'title' => 'news_show',
            ],
            [
                'id'    => 51,
                'title' => 'news_delete',
            ],
            [
                'id'    => 52,
                'title' => 'news_access',
            ],
            [
                'id'    => 53,
                'title' => 'contact_create',
            ],
            [
                'id'    => 54,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 55,
                'title' => 'contact_show',
            ],
            [
                'id'    => 56,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 57,
                'title' => 'contact_access',
            ],
            [
                'id'    => 58,
                'title' => 'hawkma_create',
            ],
            [
                'id'    => 59,
                'title' => 'hawkma_edit',
            ],
            [
                'id'    => 60,
                'title' => 'hawkma_show',
            ],
            [
                'id'    => 61,
                'title' => 'hawkma_delete',
            ],
            [
                'id'    => 62,
                'title' => 'hawkma_access',
            ],
            [
                'id'    => 63,
                'title' => 'report_category_create',
            ],
            [
                'id'    => 64,
                'title' => 'report_category_edit',
            ],
            [
                'id'    => 65,
                'title' => 'report_category_show',
            ],
            [
                'id'    => 66,
                'title' => 'report_category_delete',
            ],
            [
                'id'    => 67,
                'title' => 'report_category_access',
            ],
            [
                'id'    => 68,
                'title' => 'report_create',
            ],
            [
                'id'    => 69,
                'title' => 'report_edit',
            ],
            [
                'id'    => 70,
                'title' => 'report_show',
            ],
            [
                'id'    => 71,
                'title' => 'report_delete',
            ],
            [
                'id'    => 72,
                'title' => 'report_access',
            ],
            [
                'id'    => 73,
                'title' => 'report_mangment_access',
            ],
            [
                'id'    => 74,
                'title' => 'director_create',
            ],
            [
                'id'    => 75,
                'title' => 'director_edit',
            ],
            [
                'id'    => 76,
                'title' => 'director_show',
            ],
            [
                'id'    => 77,
                'title' => 'director_delete',
            ],
            [
                'id'    => 78,
                'title' => 'director_access',
            ],
            [
                'id'    => 79,
                'title' => 'goal_create',
            ],
            [
                'id'    => 80,
                'title' => 'goal_edit',
            ],
            [
                'id'    => 81,
                'title' => 'goal_show',
            ],
            [
                'id'    => 82,
                'title' => 'goal_delete',
            ],
            [
                'id'    => 83,
                'title' => 'goal_access',
            ],
            [
                'id'    => 84,
                'title' => 'partner_create',
            ],
            [
                'id'    => 85,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 86,
                'title' => 'partner_show',
            ],
            [
                'id'    => 87,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 88,
                'title' => 'partner_access',
            ],
            [
                'id'    => 89,
                'title' => 'about_association_access',
            ],
            [
                'id'    => 90,
                'title' => 'program_create',
            ],
            [
                'id'    => 91,
                'title' => 'program_edit',
            ],
            [
                'id'    => 92,
                'title' => 'program_show',
            ],
            [
                'id'    => 93,
                'title' => 'program_delete',
            ],
            [
                'id'    => 94,
                'title' => 'program_access',
            ],
            [
                'id'    => 95,
                'title' => 'need_create',
            ],
            [
                'id'    => 96,
                'title' => 'need_edit',
            ],
            [
                'id'    => 97,
                'title' => 'need_show',
            ],
            [
                'id'    => 98,
                'title' => 'need_delete',
            ],
            [
                'id'    => 99,
                'title' => 'need_access',
            ],
            [
                'id'    => 100,
                'title' => 'association_create',
            ],
            [
                'id'    => 101,
                'title' => 'association_edit',
            ],
            [
                'id'    => 102,
                'title' => 'association_show',
            ],
            [
                'id'    => 103,
                'title' => 'association_delete',
            ],
            [
                'id'    => 104,
                'title' => 'association_access',
            ],
            [
                'id'    => 105,
                'title' => 'course_request_create',
            ],
            [
                'id'    => 106,
                'title' => 'course_request_edit',
            ],
            [
                'id'    => 107,
                'title' => 'course_request_show',
            ],
            [
                'id'    => 108,
                'title' => 'course_request_delete',
            ],
            [
                'id'    => 109,
                'title' => 'course_request_access',
            ],
            [
                'id'    => 110,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 111,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 112,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 113,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 114,
                'title' => 'beneficiary_create',
            ],
            [
                'id'    => 115,
                'title' => 'beneficiary_edit',
            ],
            [
                'id'    => 116,
                'title' => 'beneficiary_show',
            ],
            [
                'id'    => 117,
                'title' => 'beneficiary_delete',
            ],
            [
                'id'    => 118,
                'title' => 'beneficiary_access',
            ],
            [
                'id'    => 119,
                'title' => 'course_enrollement_access',
            ],
            [
                'id'    => 120,
                'title' => 'hawkam_category_create',
            ],
            [
                'id'    => 121,
                'title' => 'hawkam_category_edit',
            ],
            [
                'id'    => 122,
                'title' => 'hawkam_category_show',
            ],
            [
                'id'    => 123,
                'title' => 'hawkam_category_delete',
            ],
            [
                'id'    => 124,
                'title' => 'hawkam_category_access',
            ],
            [
                'id'    => 125,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}