<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UtilisateurTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Utilisateurs
 *
 * @method \App\Model\Entity\UtilisateurType get($primaryKey, $options = [])
 * @method \App\Model\Entity\UtilisateurType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UtilisateurType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UtilisateurType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UtilisateurType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UtilisateurType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UtilisateurType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class UtilisateurTypesTable extends Table
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

        $this->setTable('utilisateur_types');
        $this->setDisplayField('designation');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Utilisateurs', [
            'foreignKey' => 'utilisateur_type_id'
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
        $validator->requirePresence('designation', 'create')->notEmpty('designation');
        return $validator;
    }
}
