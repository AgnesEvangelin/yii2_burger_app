<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%burger}}".
 *
 * @property int $id
 * @property string $burger_id
 *
 * @property Cart[] $carts
 * @property Items[] $items
 * @property Orders[] $orders
 */
class Burger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%burger}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['burger_id'], 'required'],
            [['burger_id'], 'string', 'max' => 12],
            [['burger_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'burger_id' => 'Burger ID',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CartQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['burger_id' => 'id']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ItemsQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['burger_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\OrdersQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['burger_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\BurgerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\BurgerQuery(get_called_class());
    }
}
