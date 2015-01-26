<?php

namespace Foundation\BackendBundle\Entity\Security;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Description of Md5Encoder
 * UPDATE `symfony`.`user` SET `password`=MD5(CONCAT(LEFT(salt,10),'s^q', 'password')) WHERE id=?;
 * 
 * @DI\Service("fundation.backend.entity.security.md5encoder")
 * @author nks
 */
class Md5Encoder implements PasswordEncoderInterface{
    
    public function __construct() {
    }
    
    public function encodePassword($raw, $salt) {
        return md5(substr($salt, 0, 10)  . "s^q" . $raw);
    }

    public function isPasswordValid($encoded, $raw, $salt) {
        return $this->encodePassword($raw, $salt) === $encoded;
    }
}
