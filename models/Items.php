<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%items}}".
 *
 * @property int $id
 * @property int|null $quantity
 * @property int $burger_id
 * @property int $ingredient_id
 *
 * @property Burger $burger
 * @property Ingredients $ingredient
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%items}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'burger_id', 'ingredient_id'], 'integer'],
            [['burger_id', 'ingredient_id'], 'required'],
            [['burger_id'], 'exist', 'skipOnError' => true, 'targetClass' => Burger::className(), 'targetAttribute' => ['burger_id' => 'id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Quantity',
            'burger_id' => 'Burger ID',
            'ingredient_id' => 'Ingredient ID',
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
     * Gets query for [[Ingredient]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\IngredientsQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredient_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ItemsQuery(get_called_class());
    }
}
