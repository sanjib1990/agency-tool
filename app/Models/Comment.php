<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package App\Models
 */
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'project_id', 'stage_id', 'comment', 'created_by'
    ];

    /**
     * Comment belongs to a project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Comment belongs to a stage of the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    /**
     * Comment is created by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
