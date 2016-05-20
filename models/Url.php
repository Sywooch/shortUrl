<?php

namespace app\models;

use Yii;
use app\components\UsefulFunctions;
use yii\base\Security;

/**
 * This is the model class for table "Url".
 *
 * @property integer $url_id
 * @property string $token
 * @property string $original
 */
class Url extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token', 'original'], 'required'],
            [['original'], 'string'],
            [['token'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'url_id' => 'Url ID',
            'token' => 'Token',
            'original' => 'Original',
        ];
    }

    public function insertUrl($originalURL){
        $security = new Security();
        $token = $security->generateRandomString(6);

        $this->original = UsefulFunctions::addUrlScheme($originalURL);
        $this->token = $token;

        return $this->insert();
    }

    /**
     * @inheritdoc
     * @return UrlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UrlQuery(get_called_class());
    }
}
