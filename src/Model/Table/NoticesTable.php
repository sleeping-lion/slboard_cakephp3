<?php
namespace App\Model\Table;

use App\Model\Entity\Notice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notices Model
 */
class NoticesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('notices');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('NoticeContents', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('enable', 'valid', ['rule' => 'boolean'])
            ->requirePresence('enable', 'create')
            ->notEmpty('enable')
            ->add('count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('count', 'create')
            ->notEmpty('count')
            ->add('created_at', 'valid', ['rule' => 'datetime'])
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at')
            ->add('updated_at', 'valid', ['rule' => 'datetime'])
            ->requirePresence('updated_at', 'create')
            ->notEmpty('updated_at');

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
        return $rules;
    }
}
