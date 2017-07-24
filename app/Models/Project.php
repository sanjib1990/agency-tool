<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @package App\Models
 */
class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'description',

        'start_date',
        'end_date',
        'stage_id',
        'active',

        'created_by',
        'updated_by',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'active'    => 'bool'
    ];

    /**
     * Project belongs to a stage.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    /**
     * Project is created by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Project us updated by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Scope for active and adding user id.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('created_by', auth()->user()->id)->where('active', true);
    }

    /**
     * @param array $wheres
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(array $wheres = [])
    {
        return $this->active()->where($wheres)->get();
    }
}
