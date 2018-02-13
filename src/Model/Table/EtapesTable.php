<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etapes Model
 *
 * @property \Cake\ORM\Association\HasMany $OperationEtapeTaches
 * @property \Cake\ORM\Association\HasMany $Taches
 *
 * @method \App\Model\Entity\Etape get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etape newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etape[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etape|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etape patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etape[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etape findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class EtapesTable extends Table
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

        $this->setTable('etapes');
        $this->setDisplayField('designation');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OperationEtapeTaches', [
            'foreignKey' => 'etape_id'
        ]);
        $this->hasMany('Taches', [
            'foreignKey' => 'etape_id'
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
