<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->name,
        'type' => 'BASIC',
        'barcode' => $faker->isbn13,
        'price' => $faker->randomNumber(7),
        'unit' => $faker->randomElement(['chiếc', 'đôi', 'thanh', 'tấm']),
        'sku' => $faker->bothify('????########'),
        'weight' => $faker->numerify('##kg'),
        'height' => $faker->numerify('##m'),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'detail' => $faker->paragraphs($nb = 3, $asText = true),
        'is_public' => $faker->randomElement(['0', '1']),
        'is_highlight' => $faker->randomElement(['0', '1']),
        'is_new' => $faker->randomElement(['0', '1']),
        'is_taxable' => $faker->randomElement(['0', '1']),
        'slug' => Str::slug($name),
        'quantity' => $faker->randomNumber(3),
        'meta_title' => $name,
        'meta_description' => $faker->text($maxNbChars = 50),
        'meta_keyword' => implode(',',$faker->words($nb = 7, $asText = false)),
        'meta_page_topic' => $faker->text($maxNbChars),
    ];
});
