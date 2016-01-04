<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * History Entity.
 */
class History extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'year' => true,
        'title' => true,
        'content' => true,
        'count' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
    ];
}
