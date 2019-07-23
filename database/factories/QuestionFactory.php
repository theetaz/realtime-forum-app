<?php

/* @var $factory Factory */

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {

    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph,
        'category_id' => Category::all()->random(),
        'user_id' => User::all()->random(),
    ];
});


