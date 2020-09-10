<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property int $id
 * @property int $burger_id
 *
 * @property Burger $burger
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['burger_id'], 'required'],
            [['burger_id'], 'integer'],
            [['burger_id'], 'exist', 'skipOnError' => true, 'targetClass' => Burger::className(), 'targetAttribute' => ['burger_id' => 'id']],
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
     * Gets query for [[Burger]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BurgerQuery
     */
    public function getBurger()
    {
        return $this->hasOne(Burger::className(), ['id' => 'burger_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CartQuery(get_called_class());
    }
}
