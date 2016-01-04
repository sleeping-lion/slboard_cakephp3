<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserPhoto Entity.
 */
class UserPhoto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'photo' => true,
        'alt' => true,
        'default' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
    ];
}
