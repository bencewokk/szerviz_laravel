<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'client_id',
        'car_id',
        'type',
        'registered',
        'ownbrand',
        'accident',
    ];

    
        public function services()
    {
        return $this->hasMany(Service::class, 'car_id');
    }

 }

