<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menuItems = [
            'users',
            'glossary',
            'equipments',
            'sheets',
            'catalogs',
            'orders',
        ];

        foreach ($menuItems as $menuItem) {
            Menu::create(['menu_item' => $menuItem]);
        }
    }
}
