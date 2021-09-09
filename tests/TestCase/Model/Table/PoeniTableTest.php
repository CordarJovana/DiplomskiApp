<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PoeniTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PoeniTable Test Case
 */
class PoeniTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PoeniTable
     */
    protected $Poeni;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Poeni',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Poeni') ? [] : ['className' => PoeniTable::class];
        $this->Poeni = $this->getTableLocator()->get('Poeni', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Poeni);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PoeniTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
