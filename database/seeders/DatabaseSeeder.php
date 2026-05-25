<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisitRequest;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Воспитувач корисник
        User::insert([
            [
                'name'       => 'Vospituvac',
                'email'      => 'vospituvac@idrizovo.com',
                'password'   => Hash::make('Vospituvac2026!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin',
                'email'      => 'admin@admin.com',
                'password'   => Hash::make('AdminPassword123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Примери за барања за посети
        VisitRequest::insert([
            [
                'visitor_name'   => 'Марија Петровска',
                'visitor_email'  => 'marija@gmail.com',
                'phone'          => '078 123 456',
                'prisoner_name'  => 'Александар Петровски',
                'request_date'   => '2025-05-20',
                'status'         => 'pending',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Горан Николovski',
                'visitor_email'  => 'goran@gmail.com',
                'phone'          => '070 987 654',
                'prisoner_name'  => 'Dragan Nikolovski',
                'request_date'   => '2025-05-18',
                'status'         => 'approved',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Елена Стојанова',
                'visitor_email'  => 'elena@yahoo.com',
                'phone'          => '075 321 789',
                'prisoner_name'  => 'Stefan Stojanov',
                'request_date'   => '2025-05-15',
                'status'         => 'rejected',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Бојан Димитриевски',
                'visitor_email'  => 'bojan@gmail.com',
                'phone'          => '071 456 123',
                'prisoner_name'  => 'Nikola Dimitrieski',
                'request_date'   => '2025-05-22',
                'status'         => 'pending',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'visitor_name'   => 'Сузана Јовановска',
                'visitor_email'  => 'suzana@gmail.com',
                'phone'          => '076 654 321',
                'prisoner_name'  => 'Marko Jovanovski',
                'request_date'   => '2025-05-19',
                'status'         => 'approved',
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