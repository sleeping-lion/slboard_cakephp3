<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PortfolioContent Entity.
 */
class PortfolioContent extends Entity
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
