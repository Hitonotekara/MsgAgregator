<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/2/17
 * Time: 10:49 PM
 */

namespace backend\models;

use yii\db\ActiveRecord;

class SenderList extends ActiveRecord

{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    public static function tableName()

    {
        return '{{list}}';
    }

}
