<?php

use Illuminate\Database\Seeder;
use App\Models\TodoLists;

class ToDoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TodoLists::create([
            'title' => '123',
            'content' => '456',
        ]);
    }
}
