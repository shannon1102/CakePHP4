<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TFeedTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TFeedTable Test Case
 */
class TFeedTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TFeedTable
     */
    protected $TFeed;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TFeed',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TFeed') ? [] : ['className' => TFeedTable::class];
        $this->TFeed = TableRegistry::getTableLocator()->get('TFeed', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TFeed);

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
}
