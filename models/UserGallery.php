<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_gallery".
 *
 * @property int $id
 * @property int $user_id
 * @property string $gallery_name
 * @property string $gallery_description
 * @property string $gallery_front_image
 *
 * @property User $user
 */
class UserGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gallery_name'], 'required'],
            [['user_id'], 'integer'],
            [['gallery_description'], 'string'],
            [['gallery_name', 'gallery_front_image'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => '\yiidreamteam\upload\ImageUploadBehavior',
                'attribute' => 'gallery_front_image',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'height' => 300],
                ],
                'filePath' => '@webroot/images/gallery_image/[[pk]].[[extension]]',
                'fileUrl' => '/images/gallery_image/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/thumbnail/gallery_[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/thumbnail/gallery_[[profile]]_[[pk]].[[extension]]',
            ],
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
            'gallery_name' => 'Gallery Name',
            'gallery_description' => 'Gallery Description',
            'gallery_front_image' => 'Gallery Front Image',
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
