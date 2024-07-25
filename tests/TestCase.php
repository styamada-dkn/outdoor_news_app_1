<?php

namespace Tests;

use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected string $seeder = CategorySeeder::class;
}
