<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feed Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int $user_id
 * @property string|null $image_file_name
 * @property string|null $video_file_name
 * @property string|null $message
 * @property \Cake\I18n\FrozenTime|null $update_at
 * @property \Cake\I18n\FrozenTime|null $create_at
 *
 * @property \App\Model\Entity\User $user
 */
class Feed extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'user_id' => true,
        'image_file_name' => true,
        'video_file_name' => true,
        'message' => true,
        'update_at' => true,
        'create_at' => true,
        'user' => true,
    ];
}
