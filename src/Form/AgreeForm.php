<?php
	namespace App\Form;
	
	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;
	
	class AgreeForm extends Form {
		protected function _buildSchema(Schema $schema) {
			return $schema->addField('agree1','boolean')->addField('agree2','boolean');
		}
		
		public function setErrors($errors) {
			$this->_errors=$errors;
		}
		
		protected function _buildValidator(Validator $validator) {
			return $validator->add('agree1', 'valid', ['rule' => array('comparison', '!=', 0)])->requirePresence('agree1',true)->notEmpty('agree1')->add('agree2', 'valid', ['rule' => array('comparison', '!=', 0)])->requirePresence('agree2',true)->notEmpty('agree2');		
		}
		
		protected function _execute(Array $data) {
			$val=$this->validate($data);
			if($val)  {
				return true;
			} else {
				return false;
			}
		}
	}
