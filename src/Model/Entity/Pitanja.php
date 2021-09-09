<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pitanja Entity
 *
 * @property int $id
 * @property string $pitanje
 * @property string $tacanodgovor
 * @property string $netacanodgovor
 * @property int $koznaznaid
 */
class Pitanja extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'pitanje' => true,
        'tacanodgovor' => true,
        'netacanodgovor' => true,
        'koznaznaid' => true,
    ];
}
