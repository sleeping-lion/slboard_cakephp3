<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity.
 */
class Blog extends Entity
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
        'description' => true,
        'photo' => true,
        'blog_comments_count' => true,
        'count' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'blog_category' => true,
        'blog_comments' => true,
        'blog_translations' => true,
    ];
}
