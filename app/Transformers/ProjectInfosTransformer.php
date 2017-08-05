<?php

namespace App\Transformers;

/**
 * Class ProjectInfosTransformer
 *
 * @package App\Transformers
 */
class ProjectInfosTransformer extends Transformer
{
    /**
     * Transform the data.
     *
     * @param $data
     *
     * @return mixed
     */
    public function transform($data)
    {
        dd($data->toArray());
    }
}
