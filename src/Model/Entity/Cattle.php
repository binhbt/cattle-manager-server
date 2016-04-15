<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cattle Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $blood
 * @property int $weight
 * @property \Cake\I18n\Time $buy_date
 * @property int $month_old
 * @property int $cost
 * @property int $status
 * @property \Cake\I18n\Time $sale_date
 * @property int $sale_price
 * @property int $sale_status
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Photo[] $photos
 * @property \App\Model\Entity\Weight[] $weights
 */
class Cattle extends Entity
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
        'id' => false,
    ];
}
