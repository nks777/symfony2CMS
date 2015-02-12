<?php

namespace Foundation\BackendBundle\Entity\Security;

use Symfony\Component\Security\Core\User\UserInterface;
//orm
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
//form validation
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\Email; 
use Symfony\Component\Validator\Constraints\Length;

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
    
    const ENTITY_NAME = "FoundationBackendBundle:Security\User";
    
    const ROLE_ADMIN = "ROLE_ADMIN";

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @NotBlank()
     * @ORM\Column(type="string", length=60, unique=true)
     * @Length(min=3, max=60)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     * @Length(min=6, max=60)
     */
    private $password;
    
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $salt;
    
    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @NotBlank()
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
    
    /**
     *@ORM\Column(type="datetime", nullable=false)
     * @var date
     */
    private $lastUpdateDate;
    
    /**
     * @ManyToOne(targetEntity="User", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="SET NULL", nullable=true)
     * @var User
     */
    private $updater;
    
    /**
     *@ORM\Column(type="datetime", nullable=true)
     * @var date
     */
    private $lastLogin;

    public function eraseCredentials() {
        $this->password = null;
    }
    
    function getLastLogin() {
        return $this->lastLogin;
    }

    function setLastLogin(\DateTime $lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    function getLastUpdateDate() {
        return $this->lastUpdateDate;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setLastUpdateDate(\DateTime $lastUpdateDate) {
        $this->lastUpdateDate = $lastUpdateDate;
    }

    function setUpdater(User $updater) {
        $this->updater = $updater;
    }
        
    function getCreateDate() {
        return $this->createDate;
    }

    function setCreateDate(\DateTime $createDate) {
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
    
    public function hasRole($role){
        return in_array($role, $this->getRoles(), true);
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
