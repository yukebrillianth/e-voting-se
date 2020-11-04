<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'has_voted', 'class_id'];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
