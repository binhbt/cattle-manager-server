<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeightsTable Test Case
 */
class WeightsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WeightsTable
     */
    public $Weights;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.weights',
        'app.cattles',
        'app.users',
        'app.costs',
        'app.events',
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
        $config = TableRegistry::exists('Weights') ? [] : ['className' => 'App\Model\Table\WeightsTable'];
        $this->Weights = TableRegistry::get('Weights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Weights);

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
