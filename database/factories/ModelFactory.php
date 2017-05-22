<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */ 
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'user_aboutme' => $faker->paragraph,
        'user_contact' => "09000000000",
        'user_type' => "sponsor",
        'user_imagepath' => "default",
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Sponsor::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->user_id,
        'sponsor_fname' => $faker->firstName,
        'sponsor_lname' => $faker->lastName,
        'sponsor_address' => $faker->address,
        'sponsor_job' => 'Human Resource',
        'sponsor_agency' => 'Team Rocket Corp',
        'sponsor_agencyAddress' => 'Number 4 Privet Drive, Little Whinging, Surrey',
    ];
});

$factory->define(App\Scholarships::class, function (Faker\Generator $faker) {

    return [
        'sponsor_id' => App\Sponsor::all()->random()->sponsor_id,
        'scholarship_name' => $faker->name,
        'scholarship_desc' => "Lorem ipsum keme keme keme 48 years fayatollah kumenis guash otoko boyband intonses matod juts warla shala krung-krung.",
        'scholarship_logo' => "default",
        'scholarship_coverage' => "7 days",
    ];
});


$factory->define(App\ScholarshipGrant::class, function (Faker\Generator $faker) {

    return [
        'scholarship_id' => App\Scholarships::all()->random()->scholarship_id,
        'scholarship_grantDesc' => "Lorem ipsum keme keme keme 8 years shonget at nang at ang matod at.",
    ];
});

$factory->define(App\ScholarshipSpecification::class, function (Faker\Generator $faker) {

    return [
        'scholarship_id' => App\Scholarships::all()->random()->scholarship_id,
        'scholarship_specDesc' => "Lorem ipsum keme keme keme 4 years na ang borta sa ano waz jowa.",
    ];
});

$factory->define(App\ScholarshipsDeadline::class, function (Faker\Generator $faker) {

    return [
        'scholarship_id' => App\Scholarships::all()->random()->scholarship_id,
        'scholarship_deadlinestartdate' => $faker->dateTimeBetween('+0 days', '+4 days'),
        'scholarship_deadlineenddate' => $faker->dateTimeBetween('+5 days', '+1 week'),
    ];
});

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'user_name' => $faker->name,
//         'user_email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'user_aboutme' => $faker->paragraph(6),
//         'user_type' => "student",
//         'user_imagepath' => "default",
//         'remember_token' => str_random(10),
//     ];
// });
