<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ingredients}}".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $price
 *
 * @property Items[] $items
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ingredients}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 20],
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
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ItemsQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['ingredient_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\IngredientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\IngredientsQuery(get_called_class());
    }
}
