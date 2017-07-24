<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Cache\Repository;

/**
 * Class BaseModel
 *
 * @package App\Models
 */
abstract class BaseModel extends Model
{
    /**
     * @var Repository
     */
    protected $cache;

    /**
     * BaseModel constructor.
     *
     * @param array      $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->cache    = app()->make(Repository::class);
    }
}
