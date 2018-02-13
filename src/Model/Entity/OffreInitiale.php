<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OffreInitiale Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $volume_commande
 * @property int $volume_facture
 * @property bool $routage
 * @property int $nb_thematique
 * @property float $cpm
 * @property float $ht
 * @property float $tva
 * @property float $ttc
 * @property int $partenaire_id
 * @property int $demande_id
 * @property int $utilisateur_id
 * @property int $statut_id
 *
 * @property \App\Model\Entity\Partenaire $partenaire
 * @property \App\Model\Entity\Demande $demande
 * @property \App\Model\Entity\Utilisateur $utilisateur
 * @property \App\Model\Entity\Statut $statut
 * @property \App\Model\Entity\OffreInitialeOperation[] $offre_initiale_operations
 */class OffreInitiale extends Entity
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
