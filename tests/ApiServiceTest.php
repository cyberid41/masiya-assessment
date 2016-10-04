<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiServiceTest extends TestCase
{
    /**
     * Can get list employee
     *
     * @return void
     */
    public function testListEmployee()
    {
        $this->json('GET', '/api/employee')
            ->seeJsonStructure([
                ['id', 'name', 'position', 'city', 'email', 'department', 'avatar']
            ]);
    }
}
