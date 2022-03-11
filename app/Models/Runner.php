<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Runner extends Model
{
  // protected $table = 'runners';
  public $timestamps = false;
  protected $connection = 'sqlite';
  protected $fillable = [
    'name',
    'cpf',
    'birth'
  ];

  public function register(array $data){
    $sql = self::insert([
      'name' => $data['name'],
      'cpf' => $data['cpf'],
      'birth' => $data['birth']
    ]);
  }

  public function remove(string $id)
  {
    self::where('id', $id)->delete();
  }
}