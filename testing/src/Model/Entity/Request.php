<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity.
 *
 * @property int $id
 * @property int $book_id
 * @property \App\Model\Entity\Book $book
 * @property int $user_id_borrower
 * @property int $user_id_owner
 * @property int $Weeks
 * @property bool $ownerAck
 * @property bool $rentPaid
 */
class Request extends Entity
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
