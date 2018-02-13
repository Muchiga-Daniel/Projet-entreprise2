<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OperationEtapeTach Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $date_relance
 * @property \Cake\I18n\Time $date_fin
 * @property string $remarque
 * @property int $utilisateur_id
 * @property int $operation_id
 * @property int $etape_id
 * @property int $tache_id
 *
 * @property \App\Model\Entity\Utilisateur $utilisateur
 * @property \App\Model\Entity\Operation $operation
 * @property \App\Model\Entity\Etape $etape
 * @property \App\Model\Entity\Tach $tach
 */class OperationEtapeTach extends Entity
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

    protected function _getDateRelance($date_relance){
        if ($date_relance !== null) return $date_relance->toDateTimeString();
    }

    protected function _getDateFin($date_fin){
        if ($date_fin !== null) return $date_fin->toDateTimeString();
    }
}
