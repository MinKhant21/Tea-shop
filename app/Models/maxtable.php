<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maxtable extends Model
{
    use HasFactory;
    protected $fillable = [
        'table', 'jointable'
    ];
}
