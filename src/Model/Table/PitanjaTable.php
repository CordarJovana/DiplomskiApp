<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pitanja Model
 *
 * @method \App\Model\Entity\Pitanja newEmptyEntity()
 * @method \App\Model\Entity\Pitanja newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pitanja[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pitanja get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pitanja findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pitanja patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pitanja[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pitanja|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pitanja saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pitanja[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pitanja[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pitanja[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pitanja[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PitanjaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pitanja');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('pitanje')
            ->requirePresence('pitanje', 'create')
            ->notEmptyString('pitanje');

        $validator
            ->scalar('tacanodgovor')
            ->maxLength('tacanodgovor', 100)
            ->requirePresence('tacanodgovor', 'create')
            ->notEmptyString('tacanodgovor');

        $validator
            ->scalar('netacanodgovor')
            ->maxLength('netacanodgovor', 100)
            ->requirePresence('netacanodgovor', 'create')
            ->notEmptyString('netacanodgovor');

        $validator
            ->integer('koznaznaid')
            ->requirePresence('koznaznaid', 'create')
            ->notEmptyString('koznaznaid');

        return $validator;
    }
}
