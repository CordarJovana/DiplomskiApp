<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Koznazna Model
 *
 * @method \App\Model\Entity\Koznazna newEmptyEntity()
 * @method \App\Model\Entity\Koznazna newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Koznazna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Koznazna get($primaryKey, $options = [])
 * @method \App\Model\Entity\Koznazna findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Koznazna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Koznazna[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Koznazna|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Koznazna saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Koznazna[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Koznazna[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Koznazna[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Koznazna[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class KoznaznaTable extends Table
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

        $this->setTable('koznazna');
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
            ->scalar('naziv')
            ->maxLength('naziv', 100)
            ->requirePresence('naziv', 'create')
            ->notEmptyString('naziv');

        return $validator;
    }
}
