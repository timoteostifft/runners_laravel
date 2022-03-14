<?php

namespace App\Http\Controllers;

use App\Services\RunnerTestService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RunnerTestController extends Controller
{
  protected $service;

  public function __construct(RunnerTestService $service)
  {
      $this->service = $service;
  }

  public function list(Request $request)
  {
    try{
      $runnersTestsList = $this->service->list($request->all());
      return response()->json($runnersTestsList,Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Erro ao listar corredores. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function register(Request $request)
  {

  }

  public function remove($testId, $runenrId)
  {
    echo $testId .'-'. $runenrId;
  }
}
