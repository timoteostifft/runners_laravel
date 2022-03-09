<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Runner extends Model
{
  protected $connection = 'sqlite';
  protected $table = 'runners';

  public function list(){
    dd('database');
  }

  public function register(mixed $data){
    $sql = self::insert([
      'name' => $data['name'],
      'cpf' => $data['cpf'],
      'percent' => $data['percent']
    ]);
  }
}