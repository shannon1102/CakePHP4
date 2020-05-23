<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
class User extends Entity
{
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'name' => true,
    ];
    protected $_hidden = [
        'password',
    ];
}
