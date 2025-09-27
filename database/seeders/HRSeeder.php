<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HRSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks and truncate tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Dependent::truncate();
        \App\Models\Employee::truncate();
        \App\Models\Job::truncate();
        \App\Models\Department::truncate();
        \App\Models\Location::truncate();
        \App\Models\Country::truncate();
        \App\Models\Region::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Region
        $region = \App\Models\Region::create([
            'region_name' => 'Asia'
        ]);

        // Country
        $country = \App\Models\Country::create([
            'country_id' => 'PH',
            'country_name' => 'Philippines',
            'region_id' => $region->region_id
        ]);

        // Location
        $location = \App\Models\Location::create([
            'street_address' => '123 Tech St',
            'city' => 'Davao',
            'country_id' => $country->country_id
        ]);


        // Department
        $department = \App\Models\Department::create([
            'department_name' => 'IT',
            'location_id' => $location->location_id
        ]);

        // Job
        $job = \App\Models\Job::create([
            'job_id' => 'DEV01',
            'job_title' => 'Developer',
            'min_salary' => 30000,
            'max_salary' => 60000
        ]);

        // Employee
        $employee = \App\Models\Employee::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jdoe@example.com',
            'hire_date' => now(),
            'job_id' => $job->job_id,
            'salary' => 50000,
            'department_id' => $department->department_id
        ]);

        // Dependent
        \App\Models\Dependent::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'relationship' => 'Spouse',
            'employee_id' => $employee->employee_id
        ]);
    }
}
