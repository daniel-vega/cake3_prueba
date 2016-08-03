<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewspapersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewspapersTable Test Case
 */
class NewspapersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewspapersTable
     */
    public $Newspapers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.newspapers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Newspapers') ? [] : ['className' => 'App\Model\Table\NewspapersTable'];
        $this->Newspapers = TableRegistry::get('Newspapers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Newspapers);

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
}
