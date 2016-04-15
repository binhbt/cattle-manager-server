<?php
namespace App\Model\Table;

use App\Model\Entity\Cattle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cattles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Events
 * @property \Cake\ORM\Association\HasMany $Photos
 * @property \Cake\ORM\Association\HasMany $Weights
 */
class CattlesTable extends Table
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

        $this->table('cattles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'cattle_id'
        ]);
        $this->hasMany('Photos', [
            'foreignKey' => 'cattle_id'
        ]);
        $this->hasMany('Weights', [
            'foreignKey' => 'cattle_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('blood');

        $validator
            ->allowEmpty('weight');

        $validator
            ->dateTime('buy_date')
            ->allowEmpty('buy_date');

        $validator
            ->integer('month_old')
            ->allowEmpty('month_old');

        $validator
            ->allowEmpty('cost');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->dateTime('sale_date')
            ->allowEmpty('sale_date');

        $validator
            ->allowEmpty('sale_price');

        $validator
            ->integer('sale_status')
            ->allowEmpty('sale_status');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
