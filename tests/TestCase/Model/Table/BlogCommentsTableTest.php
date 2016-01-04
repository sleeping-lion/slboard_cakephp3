<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogCommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogCommentsTable Test Case
 */
class BlogCommentsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'BlogComments' => 'app.blog_comments',
        'Blogs' => 'app.blogs',
        'Users' => 'app.users',
        'BlogCategories' => 'app.blog_categories',
        'BlogTranslations' => 'app.blog_translations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BlogComments') ? [] : ['className' => 'App\Model\Table\BlogCommentsTable'];
        $this->BlogComments = TableRegistry::get('BlogComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BlogComments);

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
