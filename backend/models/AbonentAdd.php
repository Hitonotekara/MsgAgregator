<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/4/17
 * Time: 12:39 PM
 */

namespace backend\models;

use yii\base\Model;

class AbonentAdd extends Model
{

    public $name;

    public $description;

    public $contact;


    public function rules()

    {

        return [

            [['name', 'contact'], 'required'],

            ['contact', 'number'], // email
            //['description', 'string', 'length' => [10, 50]],
            //['description', 'default', 'value' => 'Абонент'],
            ['description', 'safe'],

        ];

    }

}
