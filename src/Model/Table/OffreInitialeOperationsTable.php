<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OffreInitialeOperations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $OffreInitiales
 *
 * @method \App\Model\Entity\OffreInitialeOperation get($primaryKey, $options = [])
 * @method \App\Model\Entity\OffreInitialeOperation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OffreInitialeOperation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OffreInitialeOperation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OffreInitialeOperation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OffreInitialeOperation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OffreInitialeOperation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class OffreInitialeOperationsTable extends Table
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

        $this->setTable('offre_initiale_operations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OffreInitiales', [
            'foreignKey' => 'offre_initiale_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Operations', [
            'foreignKey' => 'operation_id',
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
        $validator->integer('id')->allowEmpty('id', 'create');
        //$validator->requirePresence('operation', 'create')->notEmpty('operation');
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
        $rules->add($rules->existsIn(['offre_initiale_id'], 'OffreInitiales'));
        $rules->add($rules->existsIn(['operation_id'], 'Operations'));

        return $rules;
    }
}
