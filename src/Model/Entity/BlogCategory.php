<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogCategory Entity.
 */
class BlogCategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'blog_category_id' => true,
        'title' => true,
        'blogs_count' => true,
        'blog_categories_count' => true,
        'enable' => true,
        'leaf' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'blog_categories' => true,
        'blogs' => true,
    ];
}
