<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }
}
