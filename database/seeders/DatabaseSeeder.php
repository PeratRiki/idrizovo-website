<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisitRequest;
use App\Models\ContactMessage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Примери за барања за посети
        VisitRequest::insert([
            [
                'visitor_name'   => 'Марија Петровска',
                'visitor_email'  => 'marija@gmail.com',
                'phone'          => '078 123 456',
                'prisoner_name'  => 'Александар Петровски',
                'requested_date' => '2025-05-20',
                'status'         => 'pending',
                'reason'         => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Горан Николovski',
                'visitor_email'  => 'goran@gmail.com',
                'phone'          => '070 987 654',
                'prisoner_name'  => 'Dragan Nikolovski',
                'requested_date' => '2025-05-18',
                'status'         => 'approved',
                'reason'         => 'Документите се во ред.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Елена Стојanova',
                'visitor_email'  => 'elena@yahoo.com',
                'phone'          => '075 321 789',
                'prisoner_name'  => 'Stefan Stojanov',
                'requested_date' => '2025-05-15',
                'status'         => 'rejected',
                'reason'         => 'Непотполна документација.',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Бојан Димитриевски',
                'visitor_email'  => 'bojan@gmail.com',
                'phone'          => '071 456 123',
                'prisoner_name'  => 'Nikola Dimitrieski',
                'requested_date' => '2025-05-22',
                'status'         => 'pending',
                'reason'         => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Сузана Јовановска',
                'visitor_email'  => 'suzana@gmail.com',
                'phone'          => '076 654 321',
                'prisoner_name'  => 'Marko Jovanovski',
                'requested_date' => '2025-05-19',
                'status'         => 'approved',
                'reason'         => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);

        // Примери за пораки
        ContactMessage::insert([
            [
                'name'       => 'Ана Блажевска',
                'email'      => 'ana@gmail.com',
                'message'    => 'Сакам да дознаам повеќе информации за постапката за посета.',
                'is_read'    => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Петар Костовски',
                'email'      => 'petar@gmail.com',
                'message'    => 'Кога се одржуваат работилниците за рачни изработки?',
                'is_read'    => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Ирена Спасовска',
                'email'      => 'irena@yahoo.com',
                'message'    => 'Дали можам да купам производи онлајн?',
                'is_read'    => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}