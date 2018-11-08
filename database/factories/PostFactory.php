<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    $content = '<p>'. implode('</p><p>', $faker->paragraphs(3)) .'</p>';
    $enum_status = ['draft', 'published'];
    $featured_image = $faker->image(public_path('storage/featured_image'), 1500, 800, 'people');
    $featured_image = str_replace(public_path('storage'), '', $featured_image);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $content,
        'status' => $enum_status[rand(0, 1)],
        'author_id' => rand(1, 3),
        'featured_image' => $featured_image
    ];
});
