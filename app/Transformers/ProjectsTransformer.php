<?php

namespace App\Transformers;

/**
 * Class ProjectsTransformer
 *
 * @package App\Transformers
 */
class ProjectsTransformer extends Transformer
{
    /**
     * @var array
     */
    protected $availableIncludes    = ['stage', 'created_by', 'updated_by'];

    /**
     * Transform the data.
     *
     * @param $data
     *
     * @return mixed
     */
    public function transform($data)
    {
        return [
            'uuid'          => get_data($data, 'uuid'),
            'name'          => get_data($data, 'name'),
            'slug'          => get_data($data, 'slug'),
            'description'   => get_data($data, 'description'),
            'start_date'    => date_to_iso(get_data($data, 'start_date')),
            'end_date'      => date_to_iso(get_data($data, 'end_date')),
            'end_date'      => date_to_iso(get_data($data, 'end_date')),
            'active'        => data_get($data, 'active'),
            'created_at'    => date_to_iso(get_data($data, 'created_at')),
            'updated_at'    => date_to_iso(get_data($data, 'updated_at')),
        ];
    }

    /**
     * Include Stage details for the project.
     *
     * @param $data
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeStage($data)
    {
        return $this->item($data->stage, new StagesTransformer());
    }

    /**
     * Include created by details for the project.
     *
     * @param $data
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeCreatedBy($data)
    {
        return $this->item($data->createdBy, new UsersTransformer());
    }
}
