<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Runner extends Model
{
  // protected $table = 'runners';
  public $timestamps = false;
  // protected $connection = 'mysql';
  protected $fillable = [
    'name',
    'cpf',
    'birth'
  ];

  public function remove(string $id)
  {
    self::where('id', $id)->delete();
  }
}