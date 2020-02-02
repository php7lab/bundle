<?php

namespace PhpLab\Bundle\User\Domain\Entities;

use PhpLab\Core\Domain\Base\BaseEntityWithId;
use Symfony\Component\Security\Core\User\UserInterface;

class Identity implements UserInterface
{

    private $id;
    private $username;
    private $usernameCanonical;
    private $email;
    private $emailCanonical;
    private $enabled;
    private $salt;
    private $password;
    private $lastLogin;
    private $confirmationToken;
    private $passwordRequestedAt;
    private $roles;
    private $logo;

    public function eraseCredentials()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * @param mixed $usernameCanonical
     */
    public function setUsernameCanonical($usernameCanonical): void
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * @param mixed $emailCanonical
     */
    public function setEmailCanonical($emailCanonical): void
    {
        $this->emailCanonical = $emailCanonical;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        //return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt): void
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        //return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     */
    public function setLastLogin($lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return mixed
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * @param mixed $confirmationToken
     */
    public function setConfirmationToken($confirmationToken): void
    {
        $this->confirmationToken = $confirmationToken;
    }

    /**
     * @return mixed
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * @param mixed $passwordRequestedAt
     */
    public function setPasswordRequestedAt($passwordRequestedAt): void
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->getUsername()) . '?d=retro';
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

}