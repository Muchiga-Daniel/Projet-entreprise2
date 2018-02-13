<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Statut Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $designation
 *
 * @property \App\Model\Entity\Demande[] $demandes
 * @property \App\Model\Entity\Ext1kfactureOperation[] $ext1kfacture_operations
 * @property \App\Model\Entity\OffreInitiale[] $offre_initiales
 * @property \App\Model\Entity\Operation[] $operations
 */class Statut extends Entity
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

    protected function _getCreated($created){
        return $created->toDateString();
    }

    protected function _getModified($modified){
        return $modified->toDateString();
    }

}
