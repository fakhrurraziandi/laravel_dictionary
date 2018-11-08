<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$name = $faker->sentence(2);
	$status = ['enabled', 'disabled'];
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'status' => $status[rand(0, 1)]
    ];
});
