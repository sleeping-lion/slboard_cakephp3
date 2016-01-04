<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionComment Entity.
 */
class QuestionComment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'question_id' => true,
        'user_id' => true,
        'name' => true,
        'encrypted_password' => true,
        'salt' => true,
        'content' => true,
        'created_at' => true,
        'updated_at' => true,
        'question' => true,
        'user' => true,
    ];
}
