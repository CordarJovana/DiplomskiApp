<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PitanjaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PitanjaTable Test Case
 */
class PitanjaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PitanjaTable
     */
    protected $Pitanja;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pitanja',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pitanja') ? [] : ['className' => PitanjaTable::class];
        $this->Pitanja = $this->getTableLocator()->get('Pitanja', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pitanja);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PitanjaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
