<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tach Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $designation
 * @property int $delai_jour
 * @property int $delai_heure
 * @property int $delai_minute
 * @property int $etape_id
 *
 * @property \App\Model\Entity\Etape $etape
 */class Tach extends Entity
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
