<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DisclaimerTest extends TestCase
{
    /**
     * @test
     */
    public function testDisclaimer()
    {
        $this->get(route('disclaimer.index'))->assertStatus(200);
    }
}
