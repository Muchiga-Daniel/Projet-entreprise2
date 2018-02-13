<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Demandes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Partenaires
 * @property \Cake\ORM\Association\BelongsTo $Contacts
 * @property \Cake\ORM\Association\BelongsTo $Utilisateurs
 * @property \Cake\ORM\Association\BelongsTo $Statuts
 * @property \Cake\ORM\Association\HasMany $OffreInitiales
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\Demande get($primaryKey, $options = [])
 * @method \App\Model\Entity\Demande newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Demande[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Demande|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Demande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Demande[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Demande findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class DemandesTable extends Table
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
        
        $this->setTable('demandes');
        $this->setDisplayField('code_affaire');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PartenaireClients', [
            'className' => 'Partenaires',
            'foreignKey' => 'partenaire_client_id',
            'bindingKey' => 'id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ContactClients', [
            'className' => 'Contacts',
            'foreignKey' => 'contact_client_id',
            'bindingKey' => 'id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PartenaireFactures', [
            'className' => 'Partenaires',
            'foreignKey' => 'partenaire_facture_id',
            'bindingKey' => 'id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ContactFactures', [
            'className' => 'Contacts',
            'foreignKey' => 'contact_facture_id',
            'bindingKey' => 'id',
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
        $this->hasMany('OffreInitiales', [
            'foreignKey' => 'demande_id'
        ]);
        $this->hasMany('Operations', [
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
        //$validator->requirePresence('code_affaire', 'create')->notEmpty('code_affaire');
        //$validator->requirePresence('commentaire', 'create')->notEmpty('commentaire');
        //$validator->requirePresence('ref_externe', 'create')->notEmpty('ref_externe');
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
        $rules->add($rules->existsIn(['partenaire_client_id'], 'PartenaireClients'));
        $rules->add($rules->existsIn(['contact_client_id'], 'ContactClients'));
        $rules->add($rules->existsIn(['partenaire_facture_id'], 'PartenaireFactures'));
        $rules->add($rules->existsIn(['contact_facture_id'], 'ContactFactures'));
        $rules->add($rules->existsIn(['utilisateur_id'], 'Utilisateurs'));
        $rules->add($rules->existsIn(['statut_id'], 'Statuts'));

        return $rules;
    }
}
