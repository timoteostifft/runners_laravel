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
            $id = 'teste';
            return response()->json([
                $this->service->register($id)
            ]);
        } catch (\Throwable$error){
            return response()->json(["Erro ao cadastrar usuário. Erro: {$error}"]);
        }
    }
}
