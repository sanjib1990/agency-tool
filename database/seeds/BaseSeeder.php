<?php

use Faker\Generator;
use Illuminate\Database\Seeder;

/**
 * Class BaseSeeder
 */
abstract class BaseSeeder extends Seeder
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * BaseSeeder constructor.
     *
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    abstract public function run();
}
