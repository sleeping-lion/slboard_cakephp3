<?php
	namespace App\Form;
	
	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;
	
	class ContactForm extends Form {
		protected function _buildSchema(Schema $schema) {
			return $schema->addField('agree1','boolean')->addField('agree2','boolean');
		}
		
		public function setErrors($errors) {
			$this->_errors=$errors;
		}
		
		protected function _buildValidator(Validator $validator) {
			return $validator->add('agree1', 'valid', ['rule' => 'boolean'])->requirePresence('agree1')->notEmpty('agree1')->add('agree2', 'valid', ['rule' => 'boolean'])->requirePresence('agree2')->notEmpty('agree2');		
		}
		
		protected function _execute(Array $data) {
				return true;
		}
	}
