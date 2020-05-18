<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feed Entity
 *
 * @property int $id
 * @property string $name
 * @property string $message
 * @property \Cake\I18n\FrozenTime|null $create_at
 * @property \Cake\I18n\FrozenTime|null $update_at
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
        'message' => true,
        'create_at' => true,
        'update_at' => true,
    ];
}
