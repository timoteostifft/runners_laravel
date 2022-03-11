<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    protected $service;

    public function __construct(TestService $service){
        $this->service = $service;
    }

    public function list(){}
}
