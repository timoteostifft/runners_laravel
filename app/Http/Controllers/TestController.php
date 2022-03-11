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

    public function list()
    {
      try{
        $testsList = $this->service->list();
        return response()->json($testsList,Response::HTTP_OK);
      } catch (\Throwable$error){
        return response()->json("Erro ao listar provas. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
      }
    }

    public function register(Request $request)
    {
      try{
        $test = $this->service->register($request->all());
        return response()->json($test,Response::HTTP_OK);
      } catch (\Throwable$error){
        return response()->json("Erro ao cadastrar prova. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
      }
    }


    public function remove(){}
}
