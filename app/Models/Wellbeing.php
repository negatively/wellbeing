<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wellbeing
 *
 * @property $id
 * @property $user_id
 * @property $date
 * @property $emotion
 * @property $mood
 * @property $mood_description
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Wellbeing extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'date', 'emotion', 'mood', 'mood_description'];

    protected $casts = [
        'date' => 'date',
        'emotion' => 'array'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    // Helper method to get mood text
    public function getMoodTextAttribute()
    {
        return match ($this->mood) {
            1 => 'Sangat Buruk',
            2 => 'Agak Buruk',
            3 => 'Okay',
            4 => 'Cukup Bagus',
            5 => 'Luar Biasa',
            default => 'Unknown'
        };
    }
    
}
