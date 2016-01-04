<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GuestBook Entity.
 */
class GuestBook extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'name' => true,
        'encrypted_password' => true,
        'guest_book_comments_count' => true,
        'count' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'guest_book_comments' => true,
    ];
}
