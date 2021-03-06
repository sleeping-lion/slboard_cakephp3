<?php
namespace App\Model\Table;

use App\Model\Entity\BlogCategory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogCategories Model
 */
class BlogCategoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('blog_categories');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BlogCategories', [
            'foreignKey' => 'blog_category_id'
        ]);
        $this->hasMany('BlogCategories', [
            'foreignKey' => 'blog_category_id'
        ]);
        $this->hasMany('Blogs', [
            'foreignKey' => 'blog_category_id'
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
            ->add('blogs_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('blogs_count', 'create')
            ->notEmpty('blogs_count')
            ->add('blog_categories_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('blog_categories_count', 'create')
            ->notEmpty('blog_categories_count')
            ->add('enable', 'valid', ['rule' => 'boolean'])
            ->requirePresence('enable', 'create')
            ->notEmpty('enable')
            ->add('leaf', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('leaf')
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
        $rules->add($rules->existsIn(['blog_category_id'], 'BlogCategories'));
        return $rules;
    }
}
