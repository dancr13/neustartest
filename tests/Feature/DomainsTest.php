<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\DomainController;


class DomainsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testsSuccess()
    {
        $domains = [
            'domains' => ['www.google.com' . 'www.nacion.com']
        ];

        $response = $this->json('POST', '/api/domains', $domains);
        $response->assertStatus(201);
    }

    public function testBlankParameters()
    {
        $domains = [
        ];

        $response = $this->json('POST', '/api/domains', $domains);
        $response->assertStatus(404);
    }

    public function testEmptyDomainParameter()
    {
        $domains = [
            'domains' => []
        ];

        $response = $this->json('POST', '/api/domains', $domains);
        $response->assertStatus(404);
    }
}
