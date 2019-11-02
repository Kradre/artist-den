<?php

namespace app\models;

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
                'class' => '\yiidreamteam\upload\ImageUploadBehavior',
                'attribute' => 'image_src',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'height' => 300],
                ],
                'filePath' => '@webroot/images/full/[[pk]].[[extension]]',
                'fileUrl' => '/images/full/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/thumbnail/image_[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/thumbnail/image_[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
