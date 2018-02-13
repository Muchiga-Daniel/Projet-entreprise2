<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Demande Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $code_affaire
 * @property string $commentaire
 * @property string $ref_externe
 * @property int $partenaire_client_id
 * @property int $contact_client_id
 * @property int $partenaire_facture_id
 * @property int $contact_facture_id
 * @property int $utilisateur_id
 * @property int $statut_id
 *
 * @property \App\Model\Entity\PartenaireClient $partenaire_client
 * @property \App\Model\Entity\ContactClient $contact_client
 * @property \App\Model\Entity\PartenaireFacture $partenaire_facture
 * @property \App\Model\Entity\ContactFacture $contact_facture
 * @property \App\Model\Entity\Utilisateur $utilisateur
 * @property \App\Model\Entity\Statut $statut
 * @property \App\Model\Entity\OffreInitiale[] $offre_initiales
 * @property \App\Model\Entity\Operation[] $operations
 */class Demande extends Entity
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
