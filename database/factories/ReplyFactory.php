<?php

/* @var $factory Factory */

use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'question_id' => Question::all()->random(),
        'user_id' => User::all()->random(),

    ];
});
