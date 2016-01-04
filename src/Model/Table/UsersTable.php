<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{
	public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
     

	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}

	public function beforeSave($options = array()) {
		if (isset($this -> data[$this -> alias]['password'])) {
			$passwordHasher = new DefaultPasswordHasher();
			$this -> data[$this -> alias]['encrypted_password'] = $passwordHasher -> hash($this -> data[$this -> alias]['password']);
		}

		$this -> data[$this -> alias]['group_id'] = $this -> defaultGroupId;

		return true;
	}

	public function parentNode() {
		if (!$this -> id && empty($this -> data)) {
			return null;
		}
		if (isset($this -> data['User']['group_id'])) {
			$groupId = $this -> data['User']['group_id'];
		} else {
			$groupId = $this -> field('group_id');
		}
		if (!$groupId) {
			return null;
		}

		return array('Group' => array('id' => $groupId));
	}     
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('BlogCategories', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('BlogComments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Blogs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('FaqCategories', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Faqs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Galleries', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('GalleryCategories', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('GuestBookComments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('GuestBooks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Histories', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Impressions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Notices', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Portfolios', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('QuestionComments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Questions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserPhotos', [
            'foreignKey' => 'user_id'
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
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->requirePresence('encrypted_password', 'create')
            ->notEmpty('encrypted_password')
            ->requirePresence('photo', 'create')
            ->notEmpty('photo')
            ->allowEmpty('description')
            ->allowEmpty('alternate_name')
            ->add('gender', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('gender')
            ->add('birth_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('birth_date')
            ->add('death_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('death_date')
            ->allowEmpty('url')
            ->allowEmpty('job_title')
            ->allowEmpty('reset_password_token')
            ->add('reset_password_sent_at', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('reset_password_sent_at')
            ->add('remember_created_at', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('remember_created_at')
            ->add('sign_in_count', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sign_in_count')
            ->add('current_sign_in_at', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('current_sign_in_at')
            ->add('last_sign_in_at', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('last_sign_in_at')
            ->allowEmpty('current_sign_in_ip')
            ->allowEmpty('last_sign_in_ip')
            ->add('user_photos_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('user_photos_count', 'create')
            ->notEmpty('user_photos_count')
            ->add('admin', 'valid', ['rule' => 'boolean'])
            ->requirePresence('admin', 'create')
            ->notEmpty('admin')
            ->add('intro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('intro', 'create')
            ->notEmpty('intro')
            ->add('enable', 'valid', ['rule' => 'boolean'])
            ->requirePresence('enable', 'create')
            ->notEmpty('enable')
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        return $rules;
    }
}
