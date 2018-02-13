<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Demandes
 *
 * @method \App\Model\Entity\Bat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class BatsTable extends Table
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

        $this->setTable('bats');
        $this->setDisplayField('designation');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Demandes', [
            'foreignKey' => 'demande_id'
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
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('designation', 'create')->notEmpty('designation');
        $validator->allowEmpty('senderlabel');
        $validator->requirePresence('content', 'create')->notEmpty('content');
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
        $rules->add($rules->existsIn(['demande_id'], 'Demandes'));

        return $rules;
    }
}
