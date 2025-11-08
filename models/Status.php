<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 *
 * @property Application[] $applications
 */
class Status extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['title', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['status_id' => 'id']);
    }

    public static function getStatusId(string $alias): int
    {
        /*
            SELECT id
            FROM status
            WHERE 
                alias = 'new'
        */

        return static::findOne(['alias' => $alias])->id;
    }

    public static function getStatusTitle(int $id): string
    {
        return static::findOne($id)->title;
    }

    public static function getStatusAlias(int $id): string
    {
        return static::findOne($id)->alias;
    }


    public static function getStatuses()
    {
        return static::find()
            ->select('title')
            ->indexBy('id')
            ->column();
    }
}
