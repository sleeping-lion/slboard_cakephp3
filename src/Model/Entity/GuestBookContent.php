<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GuestBookContent Entity.
 */
class GuestBookContent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'content' => true,
    ];
}
