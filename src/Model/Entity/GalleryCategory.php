<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GalleryCategory Entity.
 */
class GalleryCategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'galleries_count' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'galleries' => true,
    ];
}
