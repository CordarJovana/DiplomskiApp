<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KoznaznaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KoznaznaTable Test Case
 */
class KoznaznaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KoznaznaTable
     */
    protected $Koznazna;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Koznazna',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Koznazna') ? [] : ['className' => KoznaznaTable::class];
        $this->Koznazna = $this->getTableLocator()->get('Koznazna', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Koznazna);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KoznaznaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
