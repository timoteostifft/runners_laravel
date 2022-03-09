<?php

namespace App\Http\Controllers;

use App\Services\RunnerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RunnerController extends Controller
{
    protected $service;

    public function __construct(RunnerService $service){
        $this->service = $service;
    }

    public function list(Request $request){
        try{
            return response()->json([
                $this->service->list()
            ],201);
        } catch (\Throwable$error){
            return response()->json(["Erro ao listar corredores. Erro: {$error}"],500);
        }
    }
}
