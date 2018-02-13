<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OffreInitiales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Partenaires
 * @property \Cake\ORM\Association\BelongsTo $Demandes
 * @property \Cake\ORM\Association\BelongsTo $Utilisateurs
 * @property \Cake\ORM\Association\BelongsTo $Statuts
 * @property \Cake\ORM\Association\HasMany $OffreInitialeOperations
 *
 * @method \App\Model\Entity\OffreInitiale get($primaryKey, $options = [])
 * @method \App\Model\Entity\OffreInitiale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OffreInitiale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OffreInitiale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OffreInitiale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OffreInitiale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OffreInitiale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class OffreInitialesTable extends Table
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

        $this->setTable('offre_initiales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Partenaires', [
            'foreignKey' => 'partenaire_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Demandes', [
            'foreignKey' => 'demande_id',
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
        $this->hasMany('OffreInitialeOperations', [
            'foreignKey' => 'offre_initiale_id'
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
        //$validator->integer('volume_commande')->requirePresence('volume_commande', 'create')->notEmpty('volume_commande');
        //$validator->integer('volume_facture')->requirePresence('volume_facture', 'create')->notEmpty('volume_facture');
        //$validator->boolean('routage')->requirePresence('routage', 'create')->notEmpty('routage');
        //$validator->integer('nb_thematique')->requirePresence('nb_thematique', 'create')->notEmpty('nb_thematique');
       // $validator->decimal('cpm')->requirePresence('cpm', 'create')->notEmpty('cpm');
        //$validator->decimal('ht')->requirePresence('ht', 'create')->notEmpty('ht');
        //$validator->decimal('tva')->requirePresence('tva', 'create')->notEmpty('tva');
        //$validator->decimal('ttc')->requirePresence('ttc', 'create')->notEmpty('ttc');
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
        $rules->add($rules->existsIn(['partenaire_id'], 'Partenaires'));
        $rules->add($rules->existsIn(['demande_id'], 'Demandes'));
        $rules->add($rules->existsIn(['utilisateur_id'], 'Utilisateurs'));
        $rules->add($rules->existsIn(['statut_id'], 'Statuts'));
        
        return $rules;
    }
}
