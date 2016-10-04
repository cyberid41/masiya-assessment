<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListEmployee()
    {
        $this->json('GET', '/api/employees')
            ->seeJsonStructure([
                'data' => [
                    ['id', 'name', 'position', 'city', 'email', 'department', 'avatar']
                ]
            ]);
    }
}
