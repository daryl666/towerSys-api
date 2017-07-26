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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\SiteOrderCore::class, function (Faker\Generator $faker) {
    return [
        'region' => $faker->city,
        'site_code' => $faker->randomNumber(),
        'site_name' => $faker->address,
        'business_code' => $faker->randomNumber(),
        'req_code' => $faker->randomNumber(),
        'site_address' => $faker->address,
        'tower_type' => $faker->numberBetween(1,5),
        'product_type' => $faker->numberBetween(1,5),
        'sys_num' => $faker->numberBetween(1,1),
        'sys1_height' => $faker->numberBetween(1,9),
        'sys2_height' => $faker->numberBetween(1,9),
        'sys3_height' => $faker->numberBetween(1,9),
        'is_co_opetition' => $faker->numberBetween(0,1),
        'share_num_house' => $faker->numberBetween(1,3),
        'share_num_tower' => $faker->numberBetween(1,3),
        'share_num_support' => $faker->numberBetween(1,3),
        'share_num_import' => $faker->numberBetween(1,3),
        'share_num_site' => $faker->numberBetween(1,3),
        'share_num_maintain' => $faker->numberBetween(1,3),
        'is_newly_added' => $faker->numberBetween(0,1),
        'site_district_type' => $faker->numberBetween(1,3),
        'is_rru_away' => $faker->numberBetween(0,1),
        'user_type' => $faker->numberBetween(1,6),
        'is_new_tower' => $faker->numberBetween(0,1),
        'elec_introduced_type' => $faker->numberBetween(1,2),
        'land_form' => $faker->numberBetween(1,2),
    ];
});
