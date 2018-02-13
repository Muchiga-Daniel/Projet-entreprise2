<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Statuts Model
 *
 * @property \Cake\ORM\Association\HasMany $Demandes
 * @property \Cake\ORM\Association\HasMany $Ext1kfactureOperations
 * @property \Cake\ORM\Association\HasMany $OffreInitiales
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\Statut get($primaryKey, $options = [])
 * @method \App\Model\Entity\Statut newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Statut[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Statut|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Statut patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Statut[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Statut findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class StatutsTable extends Table
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

        $this->setTable('statuts');
        $this->setDisplayField('designation');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Demandes', [
            'foreignKey' => 'statut_id'
        ]);
        $this->hasMany('Ext1kfactureOperations', [
            'foreignKey' => 'statut_id'
        ]);
        $this->hasMany('OffreInitiales', [
            'foreignKey' => 'statut_id'
        ]);
        $this->hasMany('Operations', [
            'foreignKey' => 'statut_id'
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
        //$validator->requirePresence('designation', 'create')->notEmpty('designation');
        return $validator;
    }
}
