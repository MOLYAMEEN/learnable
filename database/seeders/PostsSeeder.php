<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Posts;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Posts::factory()->count(1000)->create();

      /* for($i=0;$i<1000;$i++){
       \DB::table('posts')->insert([
        'title'=>fake()->text(),
        'content'=>fake()->paragraph(),

       ]);
    }*/
    //Posts::factory()->count(1000)->create();
    //$posts =\DB::table('posts')->get(); 
    //foreach(\DB::table)
    }
}
