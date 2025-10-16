<?php

namespace Database\Seeders;

use App\Models\Recommendation;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'person_image' => '/Assets/Chat/Ijapi.svg',
                'company_image' => '/Assets/Chat/tedxround.svg',
                'person_name' => 'Izzafi A.',
                'title' => 'Data Eng.',
                'company' => 'TedxTelkom',
                'message' => '..Versatile full-stack developer and adaptive leader who empowers his team and drives results. Highly self-driven..',
            ],
            [
                'person_image' => '/Assets/Chat/Zulfa.svg',
                'company_image' => '/Assets/Chat/biround.png',
                'person_name' => 'Zulfa U.',
                'title' => 'Sr. UI/UX Dev.',
                'company' => 'Bank Indonesia',
                'message' => '..Adaptable engineer, quickly learned BI’s practices, consistently shipped amazing results. Sociable and dependable..',
            ],
            [
                'person_image' => '/Assets/Chat/Sheva.svg',
                'company_image' => '/Assets/Chat/tedxround.svg',
                'person_name' => 'Sheva Z.A',
                'title' => 'Content Lead',
                'company' => 'TedxNTU',
                'message' => '..Empathetic leader, very communicative and empowers teams with diverse perspectives. Collaborative and growth-oriented..',
            ],
        ];

        foreach ($data as $item) {
            Recommendation::updateOrCreate(
                [
                    'person_name' => $item['person_name'],
                    'company' => $item['company'],
                    'title' => $item['title'],
                ],
                $item
            );
        }
    }
}


