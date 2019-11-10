<?php

namespace app\models;

use dektrium\user\models\User;
use mohorev\file\UploadBehavior;
use Yii;

/**
 * This is the model class for table "image_index".
 *
 * @property int $id
 * @property int $user_id
 * @property string $image_name
 * @property string $image_description
 * @property string $image_src
 *
 * @property User $user
 */
class ImageIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image_index';
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'image_src',
                'scenarios' => ['insert', 'update'],
                'path' => '@webroot/images/full/{id}',
                'url' => '@web/images/full/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'quality' => 90],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['image_src', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],
            [['user_id', 'image_name', 'image_src'], 'required'],
            [['user_id'], 'integer'],
            [['image_description'], 'string'],
            [['image_name', 'image_src'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'image_name' => 'Image Name',
            'image_description' => 'Image Description',
            'image_src' => 'Image Src',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
