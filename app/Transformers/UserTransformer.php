<?php

/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/11/2016
 * Time: 11:48
 */
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'biens'
    ];

    public function transform(User $user){
        return[
            'id' => (int) $user->id,
            'name'=> $user->name,
        ];
    }

    public function includeBiens(User $user)
    {
        $biens = $user->biens;

        return $this->collection($biens, new BienTransformer());
    }
}