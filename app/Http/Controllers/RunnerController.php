<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

use App\Services\RunnerService;
use Illuminate\Http\Request;

class RunnerController extends Controller
{
    protected $service;

    public function __construct(RunnerService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
        try{
            $runnersList = $this->service->list();
            return response()->json($runnersList,Response::HTTP_OK);
        } catch (\Throwable$error){
            return response()->json("Erro ao listar corredores. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function register(Request $request)
    {
        try{
            $runner = $this->service->register($request->all());
            return response()->json($runner,Response::HTTP_OK);
        } catch (\Throwable$error){
            return response()->json("Erro ao cadastrar corredor. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function remove(Request $request)
    {
        try{
            $deleted = $this->service->remove($request->route('id'));
            return response()->json($deleted,Response::HTTP_OK);
        } catch (\Throwable$error){
            return response()->json("Erro ao cadastrar corredor. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
