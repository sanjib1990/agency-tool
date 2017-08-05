<?php

namespace App\Transformers;

/**
 * Class StagesTransformer
 *
 * @package App\Transformers
 */
class StagesTransformer extends Transformer
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
        return [
            'name'          => get_data($data, 'name'),
            'percentage'    => get_data($data, 'percentage'),
            'description'   => get_data($data, 'description'),
            'sequence'      => get_data($data, 'sequence')
        ];
    }
}
