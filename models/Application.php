<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 * @property int $course_id
 * @property string $date_start
 * @property int $pay_type_id
 * @property int $status_id
 *
 * @property Course $course
 * @property Feedback $feedback
 * @property PayType $payType
 * @property Status $staus
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'course_id', 'date_start', 'pay_type_id', 'status_id', 'date_start', 'time_start'], 'required'],
            [['user_id', 'course_id', 'pay_type_id', 'status_id'], 'integer'],
            [['created_at', 'date_start', 'time_start'], 'safe'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['pay_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayType::class, 'targetAttribute' => ['pay_type_id' => 'id']],

            [['date_start'], 'compare', 'compareValue' => date('Y-m-d', time() + 24 * 3600), 'operator' => '>=', "message" => "Дата должна быть не ранее следующей"],
            [['master_id'], 'exist', 'skipOnError' => true, 'targetClass' => Master::class, 'targetAttribute' => ['master_id' => 'id']],
            ['master_id', 'validateMaster']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ заявки',
            'user_id' => 'Клиент',
            'created_at' => 'Дата/время создания',
            'course_id' => 'Курс',
            'date_start' => 'Дата начала',
            'time_start' => 'Время начала',
            'pay_type_id' => 'Тип оплаты',
            'status_id' => 'Статус',
            'master_id' => 'Преподаватель курса',
        ];
    }


    public function validateMaster($attribute, $params)
    {
        if (!$this->hasErrors()) {

            // найти заявки мастера на текущую дату и время в статусе <> "final"
            $result = static::find()
                ->where(['master_id' => $this->master_id])
                ->andWhere(['date_start' => $this->date_start])
                ->andWhere(['time_start' =>  $this->time_start . ":00"])
                ->andWhere(['<>', 'status_id', Status::getStatusId('final')])
                ->count();

            if ($result) {
                $this->addError($attribute, 'На выбранную дату и время преподаватель занят.');
            }
        }
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[PayType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayType()
    {
        return $this->hasOne(PayType::class, ['id' => 'pay_type_id']);
    }

    /**
     * Gets query for [[Staus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getMaster()
    {
        return $this->hasOne(Master::class, ['id' => 'master_id']);
    }

    /**
     * Gets query for [[CancelApplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCancelApplication()
    {
        return $this->hasOne(CancelApplication::class, ['application_id' => 'id']);
    }
}
