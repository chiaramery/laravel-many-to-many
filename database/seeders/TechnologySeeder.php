<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['vue', 'sigma', 'js', 'css', 'sass', 'laravel'];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($technology);
            $new_technology->save();
        }
    }
}
