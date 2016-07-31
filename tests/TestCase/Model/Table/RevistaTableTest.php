<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RevistaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RevistaTable Test Case
 */
class RevistaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RevistaTable
     */
    public $Revista;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.revista'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Revista') ? [] : ['className' => 'App\Model\Table\RevistaTable'];
        $this->Revista = TableRegistry::get('Revista', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Revista);

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
