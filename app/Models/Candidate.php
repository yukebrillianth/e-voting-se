<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kandidat', 'visi', 'misi', 'image', 'class_id'];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
