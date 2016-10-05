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

    public function index()
    {
        $cities = $this->service->getListEmployee('city');
        $departments = $this->service->getListEmployee('department');

        return view('welcome',['cities' => $cities,'departments' => $departments]);
    }
    
}