<?php
namespace App\Model\Table;

use App\Model\Entity\Tagging;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Taggings Model
 */
class TaggingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('taggings');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
        ]);
        $this->belongsTo('Taggables', [
            'foreignKey' => 'taggable_id'
        ]);
        $this->belongsTo('Taggers', [
            'foreignKey' => 'tagger_id'
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
            ->allowEmpty('taggable_type')
            ->allowEmpty('tagger_type')
            ->allowEmpty('context')
            ->add('created_at', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('created_at');

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
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        $rules->add($rules->existsIn(['taggable_id'], 'Taggables'));
        $rules->add($rules->existsIn(['tagger_id'], 'Taggers'));
        return $rules;
    }
}
