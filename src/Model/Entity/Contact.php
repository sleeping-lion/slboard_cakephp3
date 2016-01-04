<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity.
 */
class Contact extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'phone' => true,
        'title' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
