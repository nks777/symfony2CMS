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
    function addOrUpdateAdmin();
    function deleteAdmin($removedUserId, User $currentUser = null);
}
