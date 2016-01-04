<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionContent Entity.
 */
class QuestionContent extends Entity
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
