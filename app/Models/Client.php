<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'city', 'notes'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
