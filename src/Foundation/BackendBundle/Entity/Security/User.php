<?php

namespace Foundation\BackendBundle\Entity\Security;

use Symfony\Component\Security\Core\User\UserInterface;
//orm
use Doctrine\ORM\Mapping as ORM;
//form validation
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\Email; 

/**
 * Description of User
 *
 * @author nks
 */

/**
 * AdminBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 * @UniqueEntity(fields="username", message="Such username already exists.")
 * @UniqueEntity(fields="email", message="User with such email already exists.")
 */
class User implements UserInterface, \Serializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @NotBlank()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @NotBlank(message="Username should not be blank.")
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $salt;
    
    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Email(checkHost=true)
     */
    private $email;
    
    /**
     *
     * @ORM\Column(type="string",length=255)
     */
    private $roles;
    
    /**
     *@ORM\Column(type="datetime", nullable=false)
     * @var date
     */
    private $createDate;

    public function eraseCredentials() {
        $this->password = null;
    }
    
    function getCreateDate() {
        return $this->createDate;
    }

    function setCreateDate(date $createDate) {
        $this->createDate = $createDate;
    }

        
    public function setRolesArray(array $roles){
        $this->roles = implode(",", $roles);
    }
    
    public function setRoles($roles){
        $this->roles = $roles;
    }

    public function getRoles() {
        return explode(",", $this->roles);
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getSalt() {
        return $this->salt;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->salt,
            $this->email
        ));
    }

    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                $this->password,
                $this->salt,
                $this->email
                ) = unserialize($serialized);
    }

}
