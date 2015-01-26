<?php

namespace Foundation\BackendBundle\Services;
/**
 * Description of UserServiceInt
 *
 * @author nks
 */
interface UserService {
    function getAdminsList();
    function addOrUpdateAdmin();
    function deleteAdmin();
}
