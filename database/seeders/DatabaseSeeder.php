<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create dummy users
        \App\Models\User::create([
            'name' => 'Nicole Amoguis',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'attachment' => 'test.docs',
            'dob' => '2024-05-10',
            'gender' => 'Male',
            'address' => 'Tagbilaran',
            'phone' => '09460320435',
            'status' => '0',
            'verified' => 1
        ]);

        \App\Models\User::create([
            'name' => 'Freelancer',
            'email' => 'freelancer@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'freelancer',
            'attachment' => 'test.docs',
            'dob' => '2024-05-10',
            'gender' => 'Male',
            'address' => 'Carmen',
            'salary' => '100',
            'phone' => '09460320435',
            'status' => '0',
            'verified' => 1
        ]);

        \App\Models\User::create([
            'name' => 'Employeer',
            'email' => 'employer@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'employer',
            'attachment' => 'test.docs',
            'dob' => '2024-05-10',
            'gender' => 'Male',
            'address' => 'Pilar',
            'phone' => '09460320435',
            'status' => '0',
            'verified' => 1
        ]);

        // Create dummy address
        \App\Models\Address::create([
            'name' => 'Tagbilaran'
        ]);

        \App\Models\Address::create([
            'name' => 'Pilar'
        ]);

        \App\Models\Address::create([
            'name' => 'Carmen'
        ]);


        // Create dummy job title category
        \App\Models\JobTitle::create([
            'categoryname' => 'IT/COMPUTER',
            'status' => '0'
        ]);

        \App\Models\JobTitle::create([
            'categoryname' => 'ENGINEER',
            'status' => '0'
        ]);

        \App\Models\JobTitle::create([
            'categoryname' => 'TEACHER',
            'status' => '0'
        ]);

        // Create dummy skills
        \App\Models\Skills::create([
            'skills_name' => 'WEB DEVELOPER'
        ]);

        \App\Models\Skills::create([
            'skills_name' => 'SOFTWARE ENGINEER'
        ]);

        \App\Models\Skills::create([
            'skills_name' => 'TUTORE'
        ]);

        // Create dummy skills for freelancer
        \App\Models\freelancerlists::create([
            'user_id' => 2,
            'job_title_id' => 3
        ]);

        \App\Models\freelancerlists::create([
            'user_id' => 2,
            'job_title_id' => 2
        ]);

        \App\Models\freelancerlists::create([
            'user_id' => 2,
            'job_title_id' => 1
        ]);

    }
}
