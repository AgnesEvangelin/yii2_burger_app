<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%orderaddress}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $street
 * @property string|null $city
 * @property int|null $pin
 * @property int|null $phnum
 *
 * @property Orders[] $orders
 */
class Orderaddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orderaddress}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pin', 'phnum'], 'integer'],
            [['name', 'street', 'city'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'street' => 'Street',
            'city' => 'City',
            'pin' => 'Pin',
            'phnum' => 'Phnum',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\OrdersQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['order_address_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\OrderaddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrderaddressQuery(get_called_class());
    }
}
