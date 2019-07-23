<?php

/* @var $factory Factory */

use App\Models\Like;
use App\Models\Reply;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'reply_id' => Reply::all()->random(),
        'user_id' => User::all()->random(),
    ];
});
