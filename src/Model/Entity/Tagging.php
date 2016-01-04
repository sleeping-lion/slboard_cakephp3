<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tagging Entity.
 */
class Tagging extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'tag_id' => true,
        'taggable_id' => true,
        'taggable_type' => true,
        'tagger_id' => true,
        'tagger_type' => true,
        'context' => true,
        'created_at' => true,
        'tag' => true,
        'taggable' => true,
        'tagger' => true,
    ];
}
