<?php
namespace App\Model\Table;

use App\Model\Entity\Request;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Books
 */
class RequestsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('requests');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('user_id_borrower')
            ->requirePresence('user_id_borrower', 'create')
            ->notEmpty('user_id_borrower');

        $validator
            ->integer('user_id_owner')
            ->requirePresence('user_id_owner', 'create')
            ->notEmpty('user_id_owner');

        $validator
            ->integer('Weeks')
            ->requirePresence('Weeks', 'create')
            ->notEmpty('Weeks');

        $validator
            ->boolean('ownerAck')
            ->requirePresence('ownerAck', 'create')
            ->notEmpty('ownerAck');

        $validator
            ->boolean('rentPaid')
            ->requirePresence('rentPaid', 'create')
            ->notEmpty('rentPaid');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['book_id'], 'Books'));
        return $rules;
    }
}
