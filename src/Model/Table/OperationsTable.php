<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Operations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Demandes
 * @property \Cake\ORM\Association\BelongsTo $OperationTypes
 * @property \Cake\ORM\Association\BelongsTo $Utilisateurs
 * @property \Cake\ORM\Association\BelongsTo $Statuts
 * @property \Cake\ORM\Association\HasMany $Ext1kfactureOperations
 * @property \Cake\ORM\Association\HasMany $OperationEtapeTaches
 *
 * @method \App\Model\Entity\Operation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Operation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Operation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Operation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Operation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Operation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class OperationsTable extends Table
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

        $this->setTable('operations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Demandes', [
            'foreignKey' => 'demande_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OperationTypes', [
            'foreignKey' => 'operation_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Utilisateurs', [
            'foreignKey' => 'utilisateur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuts', [
            'foreignKey' => 'statut_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Ext1kfactureOperations', [
            'foreignKey' => 'operation_id'
        ]);
        $this->hasMany('OperationEtapeTaches', [
            'foreignKey' => 'operation_id'
        ]);
        $this->belongsTo('Routeurs', [
            'foreignKey' => 'routeur_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('OffreInitialeOperations', [
            'foreignKey' => 'operation_id'
        ]);
        /*$this->hasOne('FirstOperationEtapeTaches', [
            'className' => 'OperationEtapeTaches',
            'foreignKey' => 'operation_id',
            //'joinType' => 'INNER',
            'sort' => ['FirstOperationEtapeTaches.id' => 'DESC'],
            'limit' => (1)
            //'conditions' => function ($q) {
                                //$query->where(['OperationEtapeTaches.date_fin' => 'IS null']);
                               //return $q;
                               // ->limit(1)
                           //}
        ]);*/
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
        /*$validator->requirePresence('annonceur', 'create')->notEmpty('annonceur');
        $validator->integer('priorite')->requirePresence('priorite', 'create')->notEmpty('priorite');
        $validator->requirePresence('ciblage', 'create')->notEmpty('ciblage');
        $validator->decimal('volume_commande')->requirePresence('volume_commande', 'create')->notEmpty('volume_commande');
        $validator->decimal('volume_facture')->requirePresence('volume_facture', 'create')->notEmpty('volume_facture');
        $validator->boolean('routage')->requirePresence('routage', 'create')->notEmpty('routage');
        $validator->dateTime('date_routage')->requirePresence('date_routage', 'create')->notEmpty('date_routage');
        $validator->integer('nb_thematique')->requirePresence('nb_thematique', 'create')->notEmpty('nb_thematique');
        $validator->decimal('cpm')->requirePresence('cpm', 'create')->notEmpty('cpm');
        $validator->decimal('remise')->requirePresence('remise', 'create')->notEmpty('remise');
        $validator->decimal('ht')->requirePresence('ht', 'create')->notEmpty('ht');
        $validator->decimal('tva')->requirePresence('tva', 'create')->notEmpty('tva');
        $validator->decimal('ttc')->requirePresence('ttc', 'create')->notEmpty('ttc');*/
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
        $rules->add($rules->existsIn(['operation_type_id'], 'OperationTypes'));
        $rules->add($rules->existsIn(['utilisateur_id'], 'Utilisateurs'));
        $rules->add($rules->existsIn(['statut_id'], 'Statuts'));
        $rules->add($rules->existsIn(['routeur_id'], 'Routeurs'));

        return $rules;
    }
}
