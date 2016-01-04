<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogComment Entity.
 */
class BlogComment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'blog_id' => true,
        'user_id' => true,
        'title' => true,
        'name' => true,
        'encrypted_password' => true,
        'salt' => true,
        'content' => true,
        'created_at' => true,
        'updated_at' => true,
        'blog' => true,
        'user' => true,
    ];
}
