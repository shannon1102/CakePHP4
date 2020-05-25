<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class FeedsTable extends Table
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
        $this->setTable('feeds');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');
        $validator
            ->scalar('filename')
            ->maxLength('filename', 255)
            ->allowEmptyFile('filename');
        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->allowEmptyString('message');
        $validator
            ->dateTime('create_at')
            ->allowEmptyDateTime('create_at');
        $validator
            ->dateTime('update_at')
            ->allowEmptyDateTime('update_at');
        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
