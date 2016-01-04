<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{
	protected $_virtual=['password_confirm'];
  protected $_accessible = [
        'group_id' => true,
        'email' => true,
        'name' => true,
        'encrypted_password' => true,
        'photo' => true,
        'description' => true,
        'alternate_name' => true,
        'gender' => true,
        'birth_date' => true,
        'death_date' => true,
        'url' => true,
        'job_title' => true,
        'reset_password_token' => true,
        'reset_password_sent_at' => true,
        'remember_created_at' => true,
        'sign_in_count' => true,
        'current_sign_in_at' => true,
        'last_sign_in_at' => true,
        'current_sign_in_ip' => true,
        'last_sign_in_ip' => true,
        'user_photos_count' => true,
        'admin' => true,
        'intro' => true,
        'enable' => true,
        'created_at' => true,
        'updated_at' => true,
        'group' => true,
        'blog_categories' => true,
        'blog_comments' => true,
        'blogs' => true,
        'faq_categories' => true,
        'faqs' => true,
        'galleries' => true,
        'gallery_categories' => true,
        'guest_book_comments' => true,
        'guest_books' => true,
        'histories' => true,
        'impressions' => true,
        'notices' => true,
        'portfolios' => true,
        'question_comments' => true,
        'questions' => true,
        'user_photos' => true,
    ];
}
