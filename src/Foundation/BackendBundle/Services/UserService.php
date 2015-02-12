<?php

namespace Foundation\BackendBundle\Services;

use \Foundation\BackendBundle\Entity\Security\User;
/**
 * Description of UserServiceInt
 *
 * @author nks
 */
interface UserService {
    function getAdminsList();
    function getAdminById($id);
    function saveAdmin(User $user, User $currentUser);
    function deleteAdmin($removedUserId, User $currentUser = null);
}
