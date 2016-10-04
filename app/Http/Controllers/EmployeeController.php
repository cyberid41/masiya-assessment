<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class EmployeeController extends Controller
{
    protected $service;

    public function __construct(ApiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $orderBy = $request->orderBy;

        return $this->service->getListEmployee($orderBy);
    }
    
}