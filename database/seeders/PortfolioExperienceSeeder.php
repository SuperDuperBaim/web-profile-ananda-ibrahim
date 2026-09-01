<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(config('portfolio.projects') as $p) {
            \App\Models\Portfolio::create([
                'title' => $p['name'],
                'description' => $p['description'],
                'link' => $p['demo'] ?? $p['github'],
                'image' => null
            ]);
        }

        foreach(config('portfolio.experiences') as $e) {
            \App\Models\Experience::create([
                'period' => $e['period'],
                'role' => $e['role'],
                'company' => $e['company'],
                'description' => $e['description'],
                'tech' => $e['tech']
            ]);
        }
    }
}
