<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Utilisateur Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $nom
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property int $utilisateur_type_id
 *
 * @property \App\Model\Entity\UtilisateurType $utilisateur_type
 * @property \App\Model\Entity\Demande[] $demandes
 * @property \App\Model\Entity\OffreInitiale[] $offre_initiales
 * @property \App\Model\Entity\OperationEtapeTach[] $operation_etape_taches
 * @property \App\Model\Entity\Operation[] $operations
 */class Utilisateur extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }

    protected function _getCreated($created){
        return $created->toDateString();
    }

    protected function _getModified($modified){
        return $modified->toDateString();
    }
}
