<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'amount'];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
