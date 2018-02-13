<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Operation Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $annonceur
 * @property int $priorite
 * @property bool $ciblage
 * @property int $volume
 * @property \Cake\I18n\Time $date_routage
 * @property int $nb_thematique
 * @property float $cpm
 * @property float $ht
 * @property float $tva
 * @property float $ttc
 * @property int $demande_id
 * @property int $operation_type_id
 * @property int $utilisateur_id
 * @property int $statut_id
 *
 * @property \App\Model\Entity\Demande $demande
 * @property \App\Model\Entity\OperationType $operation_type
 * @property \App\Model\Entity\Utilisateur $utilisateur
 * @property \App\Model\Entity\Statut $statut
 * @property \App\Model\Entity\Ext1kfactureOperation[] $ext1kfacture_operations
 * @property \App\Model\Entity\OperationEtapeTach[] $operation_etape_taches
 */class Operation extends Entity
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

    protected function _getDateRoutage($date_routage){
        if ($date_routage !== null) return $date_routage->toDateString();
    }
    protected function _getDateOiSigne($date_oi_signe){
        if ($date_oi_signe !== null) {
            return $date_oi_signe->toDateString();
        }
        if ($date_oi_signe == null) {
            echo "<span> Non reçu </span>";
        }  
    }
}
