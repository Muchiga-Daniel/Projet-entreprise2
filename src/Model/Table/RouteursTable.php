<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routeurs Model
 *
 * @property \Cake\ORM\Association\HasMany $OffreInitiales
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\Routeur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Routeur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Routeur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Routeur|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Routeur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Routeur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Routeur findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class RouteursTable extends Table
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

        $this->setTable('routeurs');
        $this->setDisplayField('designation');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OffreInitiales', [
            'foreignKey' => 'routeur_id'
        ]);
        $this->hasMany('Operations', [
            'foreignKey' => 'routeur_id'
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
