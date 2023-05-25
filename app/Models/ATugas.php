<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ATugas extends Model
{
    use HasFactory;
    protected $table = 'atugas';
    protected $guarded = ['id'];

    /**
     * Get the user that owns the ATugas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
