<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cancel_application".
 *
 * @property int $application_id
 * @property string $comment
 *
 * @property Application $application
 */
class CancelApplication extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cancel_application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'comment'], 'required'],
            [['application_id'], 'integer'],
            [['comment'], 'string'],
            [['application_id'], 'unique'],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::class, 'targetAttribute' => ['application_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'application_id' => 'Application ID',
            'comment' => 'Причина отмены',
        ];
    }

    /**
     * Gets query for [[Application]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Application::class, ['id' => 'application_id']);
    }
}
