<?php

namespace Foundation\BackendBundle\Entity\Security;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

/**
 * Description of Md5Encoder
 *
 * @author nks
 */
class Md5Encoder implements PasswordEncoderInterface{
    
    public function __construct() {
    }
    
    public function encodePassword($raw, $salt) {
        return md5(substr($salt, 0, 10)  . "s" . $raw);
    }

    public function isPasswordValid($encoded, $raw, $salt) {
        return $this->encodePassword($raw, $salt) === $encoded;
    }
}
