<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langs')->updateOrInsert([
            'lang' => 'HTML'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'CSS'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'JavaScript'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'PHP'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'C'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'C++'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'C#'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'Python'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'Go'
        ]);
        DB::table('langs')->updateOrInsert([
            'lang' => 'SQL'
        ]);

    }
}
