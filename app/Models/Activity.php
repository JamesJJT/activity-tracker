<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'user_id',
    ];

    public function scopeUsersActivities($query)
    {
        return $query->where('user_id', auth()->id())->get();
    }

    public function scopeUserTotalHours($query)
    {
        return $query->where('user_id', auth()->id())->sum('duration');
    }
}
