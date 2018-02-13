<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ext1kfactureOperations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Operations
 * @property \Cake\ORM\Association\BelongsTo $Statuts
 *
 * @method \App\Model\Entity\Ext1kfactureOperation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ext1kfactureOperation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ext1kfactureOperation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ext1kfactureOperation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ext1kfactureOperation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ext1kfactureOperation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ext1kfactureOperation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class Ext1kfactureOperationsTable extends Table
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

        $this->setTable('ext1kfacture_operations');
        $this->setDisplayField('code_facture_1K');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Operations', [
            'foreignKey' => 'operation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuts', [
            'foreignKey' => 'statut_id',
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
        //$validator->requirePresence('code_facture_1K', 'create')->notEmpty('code_facture_1K');
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
        $rules->add($rules->existsIn(['operation_id'], 'Operations'));
        $rules->add($rules->existsIn(['statut_id'], 'Statuts'));

        return $rules;
    }
}
