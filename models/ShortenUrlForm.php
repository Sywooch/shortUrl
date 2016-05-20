<?php

namespace app\models;

use Yii;
use yii\base\Model;


class ShortenUrlForm extends Model
{
    public $originalURL;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['originalURL', 'url', 'defaultScheme' => 'http'],
            ['originalURL', 'required']
        ];
    }

}
