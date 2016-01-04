<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gallery Entity.
 */
class Gallery extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = array(
        'user_id' => true,
        'gallery_category_id' => true,
        'title' => true,
        'content' => true,
        'location' => true,
        'photo' => true,
        'count' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'gallery_category' => true,
    );
}
