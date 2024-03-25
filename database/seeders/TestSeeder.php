<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::factory()->count(10)
        ->state(
            new Sequence(
             
                ['status'=> 'enable '],
               [ 'status'=> 'disable '],
            )
        )
        ->state(
            new Sequence(
             
                ['show'=> '0 '],
               [ 'show'=> '1 '],
              
            )
        )
        ->create();

       /* for($i=0; $i< 50; $i++)
        {
            Test::create([
                   'name'=> 'Test _'.$i,
                   'content'=> 'Content _ '.$i,
                   'status'=> 'enable ',
                   'show'=> '  1',
           ] );
        }*/

    }
}
