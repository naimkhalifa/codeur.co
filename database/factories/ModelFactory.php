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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'type' => 'reader',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'admin', function(Faker\Generator $faker) {
    return [
        'type' => 'admin',
    ];
});

$factory->state(App\User::class, 'reader', function(Faker\Generator $faker) {
    return [
        'type' => 'reader',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

    return [
        'user_id' => 1,
    	'title' => $faker->sentence,
		'subtitle' => $faker->sentence,
        'intro' => $faker->sentence,
		'main_content_markdown' => $faker->markdown(),
        'main_content_html' => $faker->text,
    ];
});

$factory->state(App\Post::class, 'published', function(Faker\Generator $faker) {
    return [
        'published_at' => $faker->dateTimeInInterval(),
    ];
});

$factory->state(App\Post::class, 'unpublished', function(Faker\Generator $faker) {
    return [
        'published_at' => null,
    ];
});