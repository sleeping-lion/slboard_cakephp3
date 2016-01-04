<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Portfolio Entity.
 */
class Portfolio extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'url' => true,
        'description' => true,
        'photo' => true,
        'enable' => true,
        'count' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
    ];
}
