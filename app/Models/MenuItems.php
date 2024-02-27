<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'parent_id'];

    public function children()
    {
        return $this->hasMany(MenuItems::class, 'parent_id');
    }
}
