<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 *
 * @package App\Models
 */
class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'user_id', 'avatar', 'login_provider'
    ];

    /**
     * Profile belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
