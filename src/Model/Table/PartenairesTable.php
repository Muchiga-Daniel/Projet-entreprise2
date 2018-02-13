<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Partenaires Model
 *
 * @property \Cake\ORM\Association\HasMany $Contacts
 * @property \Cake\ORM\Association\HasMany $OffreInitiales
 *
 * @method \App\Model\Entity\Partenaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Partenaire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Partenaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Partenaire|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partenaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Partenaire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Partenaire findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class PartenairesTable extends Table
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

        $this->setTable('partenaires');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contacts', [
            'foreignKey' => 'partenaire_id'
        ]);
        
        $this->hasMany('OffreInitiales', [
            'foreignKey' => 'partenaire_id'
        ]);

        $this->hasMany('Demandes', [
            'foreignKey' => 'partenaire_client_id',
            'bindingKey' => 'id'
        ]);
        
        $this->hasMany('Demandes', [
            'foreignKey' => 'partenaire_facture_id',
            'bindingKey' => 'id'
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
        //$validator->requirePresence('adresse', 'create')->notEmpty('adresse');
        return $validator;
    }
}
