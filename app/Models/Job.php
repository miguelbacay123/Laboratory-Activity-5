<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'hr_jobs'; 
    protected $primaryKey = 'job_id';
    public $incrementing = false;   
    protected $keyType = 'string';

    protected $fillable = ['job_id','job_title','min_salary','max_salary'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id');
    }
}
