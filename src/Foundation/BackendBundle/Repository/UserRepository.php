<?php
namespace Foundation\BackendBundle\Repository;

use Foundation\BackendBundle\Entity\Security\User;
/**
 *
 * @author nks
 */
interface UserRepository {
    
    function getListOfAdmin();
    function getAdminById($userId);
    function save(User $user);
}
