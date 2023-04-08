<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
