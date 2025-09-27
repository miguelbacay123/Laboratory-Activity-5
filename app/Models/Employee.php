<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'first_name','last_name','email','hire_date',
        'job_id','salary','department_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'employee_id');
    }
}
