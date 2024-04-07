<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_menu')->insert([

            [

                'parent_id' => 0,
                'order' => 12,
                'title' => 'Colors',
                'icon' => 'icon-list-alt',
                'uri' => '/colors',
                'created_at' => '2024-04-03 08:11:09',
                'updated_at' => '2024-04-03 08:11:09',
            ],
            [

                'parent_id' =>0,
                'order' => 13,
                'title' => 'Sizes',
                'icon' => 'icon-list-alt',
                'uri' => '/sizes',
                'created_at' => '2024-04-03 08:11:09',
                'updated_at' => '2024-04-03 08:11:09',
            ],
            [

                'parent_id' => 0,
                'order' => 14,
                'title' => 'Styles',
                'icon' => 'icon-list-alt',
                'uri' => '/styles',
                'created_at' => '2024-04-03 08:11:09',
                'updated_at' => '2024-04-03 08:11:09',
            ],
            [
                'parent_id' => 0,
                'order' => 15,
                'title' => 'Main Stock',
                'icon' => 'icon-list-alt',
                'uri' => '/items',
                'created_at' => '2024-04-03 08:11:09',
                'updated_at' => '2024-04-03 08:11:09',
            ],
            [
                'parent_id' => 0,
                'order' => 16,
                'title' => 'Routes',
                'icon' => 'icon-list-alt',
                'uri' => '/routes',
                'created_at' => '2024-04-03 08:11:09',
                'updated_at' => '2024-04-03 08:11:09',
            ],

            [
                'parent_id' => 0,
                'order' => 17,
                'title' => 'Shops',
                'icon' => 'icon-list-alt',
                'uri' => '/shops',
                'created_at' => '2024-04-03 08:11:09',
                'updated_at' => '2024-04-03 08:11:09',
            ],
        ]);
    }
}
