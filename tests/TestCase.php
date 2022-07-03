<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,DatabaseMigrations;
    //jalankan migrasi database dan install laravel passport
    public function setUp(): void
    {
        parent::setUp();
    }
}
