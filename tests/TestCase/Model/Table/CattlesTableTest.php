<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CattlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CattlesTable Test Case
 */
class CattlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CattlesTable
     */
    public $Cattles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cattles',
        'app.users',
        'app.costs',
        'app.events',
        'app.weights',
        'app.photos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cattles') ? [] : ['className' => 'App\Model\Table\CattlesTable'];
        $this->Cattles = TableRegistry::get('Cattles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cattles);

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
