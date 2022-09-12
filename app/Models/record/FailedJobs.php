<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class FailedJobs extends Model
{

    protected $table = 'failed_jobs';
    public $timestamps = true;
    protected $fillable = array('name');

}
