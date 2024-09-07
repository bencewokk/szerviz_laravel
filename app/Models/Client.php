<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'idcard',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
