<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Users' => 'app.users',
        'Groups' => 'app.groups',
        'BlogCategories' => 'app.blog_categories',
        'Blogs' => 'app.blogs',
        'BlogComments' => 'app.blog_comments',
        'BlogTranslations' => 'app.blog_translations',
        'FaqCategories' => 'app.faq_categories',
        'Faqs' => 'app.faqs',
        'Galleries' => 'app.galleries',
        'GalleryCategories' => 'app.gallery_categories',
        'GuestBookComments' => 'app.guest_book_comments',
        'GuestBooks' => 'app.guest_books',
        'Histories' => 'app.histories',
        'Impressions' => 'app.impressions',
        'Notices' => 'app.notices',
        'Portfolios' => 'app.portfolios',
        'QuestionComments' => 'app.question_comments',
        'Questions' => 'app.questions',
        'UserPhotos' => 'app.user_photos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
