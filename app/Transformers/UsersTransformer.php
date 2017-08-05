<?php

namespace App\Transformers;

/**
 * Class UsersTransformer
 *
 * @package App\Transformers
 */
class UsersTransformer extends Transformer
{
    /**
     * @var array
     */
    protected $availableIncludes    = ['profile', 'roles', 'transactions'];

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
            'uuid'  => get_data($data, 'uuid'),
            'lname' => get_data($data, 'lname'),
            'fname' => get_data($data, 'fname'),
        ];
    }
}
