<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use LaravelEnso\People\App\Enums\Genders;
use LaravelEnso\People\App\Enums\Titles;
use LaravelEnso\People\App\Models\Person;

$factory->define(Person::class, function (Faker $faker) {
    $title = Titles::keys()->random();
    $gender = $title === Titles::Mr
        ? Genders::Male
        : Genders::Female;

    return [
        'title' => $title,
        'givn' => $faker->firstName(lcfirst(Genders::get($gender))),
        'surn' => $faker->lastName(lcfirst(Genders::get($gender))),
        'name' => $faker->name(lcfirst(Genders::get($gender))),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'birthday' => Carbon::now()->subYears(rand(15, 40)),
    ];
});
