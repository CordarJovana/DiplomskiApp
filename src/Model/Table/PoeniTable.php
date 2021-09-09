<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Poeni Model
 *
 * @method \App\Model\Entity\Poeni newEmptyEntity()
 * @method \App\Model\Entity\Poeni newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Poeni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Poeni get($primaryKey, $options = [])
 * @method \App\Model\Entity\Poeni findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Poeni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Poeni[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Poeni|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Poeni saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Poeni[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Poeni[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Poeni[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Poeni[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PoeniTable extends Table
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

        $this->setTable('poeni');
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
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->notEmptyString('userid');

        $validator
            ->integer('koznaznaid')
            ->requirePresence('koznaznaid', 'create')
            ->notEmptyString('koznaznaid');

        return $validator;
    }
}
