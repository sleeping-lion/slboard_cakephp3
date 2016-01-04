<?php
namespace App\Model\Table;

use App\Model\Entity\Gallery;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Galleries Model
 */
class GalleriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('galleries');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('GalleryCategories', [
            'foreignKey' => 'gallery_category_id',
            'joinType' => 'INNER'
        ]);
        $this->addBehavior('Utils.Uploadable', [
 'photo' => [                                                    //field_name of form input
     		'path' => '{ROOT}{DS}{WEBROOT}{DS}uploads{DS}{model}{DS}{field}{DS}',
        'fileName' => '{field}.{extension}'                       // File name with extension
        ],
     ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', array('rule' => 'numeric'))
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
            
        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content');
            
        $validator
            ->allowEmpty('location');
            
				$validator->add('photo', 'file', array(
    		'rule' => array('mimeType', array('image/jpeg', 'image/png'))));
    		
    		$validator->allowEmpty('id', 'create')->allowEmpty('photo', 'update');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['gallery_category_id'], 'GalleryCategories'));
        return $rules;
    }
}
