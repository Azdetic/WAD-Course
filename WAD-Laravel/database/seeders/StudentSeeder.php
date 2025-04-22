<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'nim' => '123456',
            'name' => 'John Doe',
        ]);

        Student::create([
            'nim' => '654321',
            'name' => 'Jane Smith',
        ]);

        Student::create([
            'nim' => '111222',
            'name' => 'Alex Johnson',
        ]);
    }
}
