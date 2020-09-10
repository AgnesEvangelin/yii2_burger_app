<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property int $id
 * @property int $burger_id
 * @property int $user_id
 * @property int $order_address_id
 *
 * @property Burger $burger
 * @property Orderaddress $orderAddress
 * @property Users $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['burger_id', 'user_id', 'order_address_id'], 'required'],
            [['burger_id', 'user_id', 'order_address_id'], 'integer'],
            [['burger_id'], 'exist', 'skipOnError' => true, 'targetClass' => Burger::className(), 'targetAttribute' => ['burger_id' => 'id']],
            [['order_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orderaddress::className(), 'targetAttribute' => ['order_address_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'order_address_id' => 'Order Address ID',
        ];
    }

    /**
     * Gets query for [[Burger]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BurgerQuery
     */
    public function getBurger()
    {
        return $this->hasOne(Burger::className(), ['id' => 'burger_id']);
    }

    /**
     * Gets query for [[OrderAddress]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\OrderaddressQuery
     */
    public function getOrderAddress()
    {
        return $this->hasOne(Orderaddress::className(), ['id' => 'order_address_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UsersQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrdersQuery(get_called_class());
    }
}
