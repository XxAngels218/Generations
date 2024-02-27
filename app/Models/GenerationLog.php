<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerationLog extends Model
{
    protected $fillable = [
        'visitor_id',
        'generation',
        'password',
    ];
    use HasFactory;
}
