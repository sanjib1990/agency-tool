<?php

namespace App\Models;

/**
 * Class Stage
 *
 * @package App\Models
 */
class Stage extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'percentage', 'description', 'sequence'
    ];

    /**
     * Get the list of stages.
     *
     * @return array
     */
    public function getList()
    {
        return $this->cache->rememberForever('stage:list', function () {
            return $this->orderBy('sequence')->get()->toArray();
        });
    }

    /**
     * Get Stage name => percentage pairs.
     *
     * @return array
     */
    public function getNamePercent()
    {
        return $this->cache->rememberForever('stage:name:percent', function () {
            return collect($this->getList())->reduce(function ($array, $item) {
                $array[$item['name']] = $item['percentage'];

                return $array;
            });
        });
    }
}
