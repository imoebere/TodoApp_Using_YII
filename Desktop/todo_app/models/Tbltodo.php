<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbltodo".
 *
 * @property int $id
 * @property string $list
 */
class Tbltodo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbltodo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['list'], 'required'],
            [['list'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list' => 'List',
        ];
    }
}
