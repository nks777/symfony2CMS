<?php
namespace Foundation\BackendBundle\Repository;

use Foundation\BackendBundle\Entity\Security\User;
/**
 *
 * @author nks
 */
interface UserRepository {
    
    public function getListOfAdmin();
    function deleteAdmin(User $user);
    function getAdminById($userId);
}
