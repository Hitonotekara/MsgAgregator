<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/4/17
 * Time: 12:39 PM
 */

namespace backend\models;

use yii\base\Model;

class SenderForm extends Model
{

    public $abnId;

    public $lstId;

    public $text;


    public function rules()

    {

        return [

            [['abnId', 'lstId', 'text'], 'safe'],

        ];

    }

}