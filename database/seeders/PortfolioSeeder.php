<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Key Creations
        Portfolio::create([
            'title' => 'Portal Data External Bank Indonesia',
            'description' => 'Central Bank of Indonesia\'s portal data site for external users to access monetary data.',
            'media' => '/Assets/Videos/BIMain.mp4',
            'type' => 'key',
            'order' => 1,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Archipel Map',
            'description' => 'A modern, responsive portfolio website built with Laravel, Vue.js, and TypeScript. Features smooth animations, dynamic content, and a sleek design inspired by space aesthetics.',
            'media' => '/Assets/Videos/ArchipelMain.mp4',
            'type' => 'key',
            'order' => 2,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Task Management App',
            'description' => 'Collaborative task management application with real-time updates, team collaboration features, and intuitive user interface.',
            'media' => '/Assets/Images/Content/Task Management.png',
            'type' => 'key',
            'order' => 3,
            'is_active' => true
        ]);

        // Other Projects
        Portfolio::create([
            'title' => 'Academify',
            'description' => 'Educational Application for Teachers and Students to manage their learning journey.',
            'media' => '/Assets/Images/AcademifyMAIN.png',
            'type' => 'other',
            'order' => 1,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Singapore HDB Affordability Dashboard',
            'description' => 'Modern e-commerce solution with advanced product catalog, secure payment processing, and comprehensive admin dashboard.',
            'media' => '/Assets/Images/Content/Task Management.png',
            'type' => 'other',
            'order' => 2,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Cassava Leaf Disease Classification',
            'description' => 'Image Classification Model for Cassava Leaf Disease Detection.',
            'media' => '/Assets/Images/Content/Task Management.png',
            'type' => 'other',
            'order' => 3,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Fruity Froggy',
            'description' => 'A game I made in 2022, available in Itch.io',
            'media' => '/Assets/Images/Content/Task Management.png',
            'type' => 'other',
            'order' => 4,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Spacefolio',
            'description' => 'Portfolio 2.0, wait, hey! You\'re here! :D',
            'media' => '/Assets/Images/Content/Task Management.png',
            'type' => 'other',
            'order' => 5,
            'is_active' => true
        ]);
    }
}
