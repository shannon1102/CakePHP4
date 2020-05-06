<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookmarksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookmarksTable Test Case
 */
class BookmarksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookmarksTable
     */
    protected $Bookmarks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bookmarks',
        'app.Users',
        'app.Tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bookmarks') ? [] : ['className' => BookmarksTable::class];
        $this->Bookmarks = TableRegistry::getTableLocator()->get('Bookmarks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bookmarks);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
