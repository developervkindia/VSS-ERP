<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Department; // use Model `Department` to relate records with Jobs table records.
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{

      protected  $faker; // Add class variable property as we'll use faker..
        public function __construct() {
              $this->faker = \Faker\Factory::create();
          } // this helps create variable at beginning itself as dependency of this class.


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $departments = Department::pluck('id')->toArray();// load available departments
       for($i =0;$i< 20; $i++){
              Job::create([
                'title' => $this->faker->jobTitle,
               'description' =>  $this->faker->paragraph,
                 'slug' =>    Str::slug($this->faker->jobTitle). '-'. ($i+1), // add sequential for slug..
                   'department_id' => $this->faker->randomElement($departments),//random using `departments` that loaded previously from available departments IDs, in between all possible values.
                  'experience_required' => $this->faker->numberBetween(0,10),

                'employment_type'=>  $this->faker->randomElement(['Full Time','Part Time','Contract']),
               'salary_min' => $this->faker->numberBetween(30000,50000),
               'salary_max' => $this->faker->numberBetween(50000,150000),
                 'location_type'=>  $this->faker->randomElement(['onsite', 'remote','hybrid','custom']), // Add custom types as available..
                  'address' => $this->faker->streetAddress, // using predefined street address
                'city' => $this->faker->city,
                   'state'=>   $this->faker->state,
                      'country'  =>   $this->faker->country,
                     'postal_code' =>  $this->faker->postcode,
                   'publish_date' => \Carbon\Carbon::now(),
               'meta'=> json_encode(['skills' => [ $this->faker->word,$this->faker->word,$this->faker->word]])
              ]);
           }


    }
}
