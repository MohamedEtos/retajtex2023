<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commints extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users_ship(): BelongsTo
    {
                        //class reffear to , currnt table forgin
        return $this->belongsTo(User::class,'user_id');
    }
}
