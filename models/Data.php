<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $gt_id
 * @property int $gt_customersid
 * @property string $gt_mobile
 * @property string $gt_email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $status
 * @property string $gt_deviceid
 * @property string $gt_mobile_session_token
 * @property string $gt_log
 * @property int $created_at
 * @property int $updated_at
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gt_id', 'gt_customersid', 'gt_mobile', 'gt_email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['gt_id', 'gt_customersid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['gt_log'], 'string'],
            [['gt_mobile'], 'string', 'max' => 12],
            [['gt_email'], 'string', 'max' => 200],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'gt_mobile_session_token'], 'string', 'max' => 255],
            [['gt_deviceid'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gt_id' => 'Gt ID',
            'gt_customersid' => 'Gt Customersid',
            'gt_mobile' => 'Gt Mobile',
            'gt_email' => 'Gt Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'gt_deviceid' => 'Gt Deviceid',
            'gt_mobile_session_token' => 'Gt Mobile Session Token',
            'gt_log' => 'Gt Log',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
