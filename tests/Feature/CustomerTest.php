<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testeHomePageSuccess()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testFilterOnlyStatusFalseWithSuccess()
    {
        (array) $request = [
            'status' => '0'
        ];
        $this->json('GET', '/filter-customer', $request)->assertStatus(200);
    }

    public function testFilterOnlyStatusTrueWithSuccess()
    {
        (array) $request = [
            'status' => '1'
        ];
        $this->json('GET', '/filter-customer', $request)->assertStatus(200);
    }

    public function testFilterOnlyCountryWithSuccess()
    {
        (array) $request = [
            'country' => '(212)',
        ];
        $this->json('GET', '/filter-customer', $request)->assertStatus(200);
    }

    public function testFilterwithStatusFalseAndCountryhSuccess()
    {
        (array) $request = [
            'country' => '(212)',
            'status' => '0'
        ];
        $this->json('GET', '/filter-customer', $request)->assertStatus(200);
    }

    public function testFilterwithStatusTrueeAndCountryhSuccess()
    {
        (array) $request = [
            'country' => '(212)',
            'status' => '1'
        ];
        $this->json('GET', '/filter-customer', $request)->assertStatus(200);
    }

    public function testFilterWithoutParams()
    {
        $this->get('/filter-customer', [])->assertStatus(302);
    }
}
