<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RunnerTest extends Model
{
  public $timestamps = false;

  protected $table = 'runners_tests';
  protected $connection = 'sqlite';
  protected $fillable = [
    'runner_id',
    'test_id'
  ];
}