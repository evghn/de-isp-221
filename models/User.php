<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $full_name
 * @property string $phone
 * @property string $email
 * @property string $auth_key
 *
 * @property Application[] $applications
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role'], 'default', 'value' => 0],
            [['login', 'password', 'full_name', 'phone', 'email'], 'required'],
            [['role'], 'integer'],
            [['login', 'password', 'full_name', 'email', 'auth_key'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['login'], 'unique'],
            [['login'], 'string', 'min' => 6],
            [['password'], 'string', 'min' => 8],
            [['login'], 'match', 'pattern' => '/^[a-z\d]+$/i', 'message' => 'латиница и цифры, не менее 6 символов'],
            [['full_name'], 'match', 'pattern' => '/^[а-яё\s]+$/ui', 'message' => 'символы кириллицы и пробелы'],
            [['phone'], 'match', 'pattern' => '/^8\([\d]{3}\)[\d]{3}(-[\d]{2}){2}$/', 'message' => 'телефон формат: 8(XXX)XXX-XX-XX)'],
            ['email', 'email'],


            // а-я  ё \s

            // телефон (формат: 8(XXX)XXX-XX-XX)
            // 8\([\d]{3}\)[\d]{3}-[\d]{2}-[\d]{2}
            // 8\([\d]{3}\)[\d]{3}(-[\d]{2}){2}

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'full_name' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['user_id' => 'id']);
    }
}
