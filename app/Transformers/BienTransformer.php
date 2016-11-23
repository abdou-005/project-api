<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/11/2016
 * Time: 12:33
 */


namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Bien;

class BienTransformer extends TransformerAbstract
{

//    protected $defaultIncludes = [
//        'user'
//    ];
    public function transform(Bien $bien){
        return[
            'id' => (int) $bien->id,
            'title'=> $bien->title,
            'content'=>$bien->content,
            'user'=>$bien->user
        ];
    }
//    public function includeUser(Bien $bien)
//    {
//        $user = $bien->user;
//
//        return $this->item($user, new UserTransformer());
//    }
}