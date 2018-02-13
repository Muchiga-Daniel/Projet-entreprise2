<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationEtapeTaches Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Utilisateurs
 * @property \Cake\ORM\Association\BelongsTo $Operations
 * @property \Cake\ORM\Association\BelongsTo $Etapes
 * @property \Cake\ORM\Association\BelongsTo $Taches
 *
 * @method \App\Model\Entity\OperationEtapeTach get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationEtapeTach newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationEtapeTach[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationEtapeTach|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationEtapeTach patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationEtapeTach[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationEtapeTach findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class OperationEtapeTachesTable extends Table
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

        $this->setTable('operation_etape_taches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Utilisateurs', [
            'foreignKey' => 'utilisateur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Operations', [
            'foreignKey' => 'operation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Etapes', [
            'foreignKey' => 'etape_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Taches', [
            'foreignKey' => 'tache_id',
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
        //$validator->dateTime('date_relance')->requirePresence('date_relance', 'create')->notEmpty('date_relance');
        //$validator->dateTime('date_fin')->requirePresence('date_fin', 'create')->notEmpty('date_fin');
        //$validator->requirePresence('remarque', 'create')->notEmpty('remarque');
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
        $rules->add($rules->existsIn(['utilisateur_id'], 'Utilisateurs'));
        $rules->add($rules->existsIn(['operation_id'], 'Operations'));
        $rules->add($rules->existsIn(['etape_id'], 'Etapes'));
        $rules->add($rules->existsIn(['tache_id'], 'Taches'));

        return $rules;
    }
}
