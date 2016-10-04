<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AbstractService;

class EmployeeController extends Controller
{
    protected $service;

    public function __construct(AbstractService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getListEmployee();
    }
    
}