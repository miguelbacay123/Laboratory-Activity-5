<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'location_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'street_address',
        'city',
        'state_province',
        'postal_code',
        'country_id',
    ];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'location_id');
    }
}
