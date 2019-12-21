<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobModel extends Model
{
    protected $table = "job";
    protected $primaryKey = "id";
    public $timestamps = false;
}
