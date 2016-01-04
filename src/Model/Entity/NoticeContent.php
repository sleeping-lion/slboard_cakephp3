<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NoticeContent Entity.
 */
class NoticeContent extends Entity
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
