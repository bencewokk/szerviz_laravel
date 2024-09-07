<?php

// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\NullableType;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'client_id',
        'car_id',
        'lognumber',
        'event',
        'eventtime',
        'document_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

