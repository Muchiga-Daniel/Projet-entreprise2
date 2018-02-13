<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Utilisateurs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UtilisateurTypes
 * @property \Cake\ORM\Association\HasMany $Demandes
 * @property \Cake\ORM\Association\HasMany $OffreInitiales
 * @property \Cake\ORM\Association\HasMany $OperationEtapeTaches
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\Utilisateur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Utilisateur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Utilisateur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Utilisateur|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utilisateur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Utilisateur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Utilisateur findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UtilisateursTable extends Table
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

        $this->setTable('utilisateurs');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UtilisateurTypes', [
            'foreignKey' => 'utilisateur_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Demandes', [
            'foreignKey' => 'utilisateur_id'
        ]);
        $this->hasMany('OffreInitiales', [
            'foreignKey' => 'utilisateur_id'
        ]);
        $this->hasMany('OperationEtapeTaches', [
            'foreignKey' => 'utilisateur_id'
        ]);
        $this->hasMany('Operations', [
            'foreignKey' => 'utilisateur_id'
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
        //$validator->requirePresence('nom', 'create')->notEmpty('nom');
        //$validator->email('email')->requirePresence('email', 'create')->notEmpty('email');
        //$validator->requirePresence('password', 'create')->notEmpty('password');
       
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['utilisateur_type_id'], 'UtilisateurTypes'));

        return $rules;
    }
}
