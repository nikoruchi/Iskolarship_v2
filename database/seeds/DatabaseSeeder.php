<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class)
        factory(App\User::class, 10)->create();
        factory(App\Sponsor::class,10)->create();
        factory(App\Scholarship::class,20)->create();
        factory(App\ScholarshipsDeadline::class,20)->create();
        factory(App\ScholarshipGrant::class,100)->create();
        factory(App\ScholarshipSpecification::class,100)->create();
    }
}
