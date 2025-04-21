<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LifeBalance
 *
 * @property $id
 * @property $user_id
 * @property $date
 * @property $work
 * @property $rest
 * @property $relationship
 * @property $career
 * @property $family
 * @property $fun
 * @property $health
 * @property $personal_dev
 * @property $friends
 * @property $finances
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LifeBalance extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'date', 'work', 'rest', 'relationship', 'career', 'family', 'fun', 'health', 'personal_dev', 'friends', 'finances'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
