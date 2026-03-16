<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $global = ['Food', 'Transport', 'Shopping', 'Bills', 'Entertainment'];

        foreach ($global as $name) {
            Category::create([
                'name' => $name,
                'user_id' => null 
            ]);
        }
    }
}
