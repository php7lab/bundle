<?php

namespace PhpLab\Bundle\User\Domain\Services;

use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Illuminate\Support\Collection;
use PhpLab\Bundle\Crypt\Entities\JwtEntity;
use PhpLab\Bundle\Crypt\Interfaces\Services\JwtServiceInterface;
use PhpLab\Bundle\Crypt\Repositories\Config\ProfileRepository;
use PhpLab\Bundle\Crypt\Services\JwtService;
use PhpLab\Bundle\User\Domain\Entities\User;
use PhpLab\Bundle\User\Domain\Exceptions\UnauthorizedException;
use PhpLab\Bundle\User\Domain\Forms\AuthForm;
use PhpLab\Core\Domain\Entities\ValidateErrorEntity;
use PhpLab\Core\Domain\Exceptions\UnprocessibleEntityException;
use PhpLab\Core\Legacy\Yii\Base\Security;

class AuthService
{

    private $em;
    private $userManager;
    private $security;
    private $jwtService;

    public function __construct(EntityManagerInterface $em, UserManagerInterface $userManager, JwtServiceInterface $jwtService)
    {
        $this->em = $em;
        $this->userManager = $userManager;
        $this->security = new Security;
        $this->jwtService = $jwtService;
    }

    public function info(): UserInterface
    {
        /** @var User $userEntity */
        $userEntity = $this->userManager->findUserByUsername('user1');
        if (empty($userEntity)) {
            $exception = new UnauthorizedException;
            throw $exception;
        }
        return $userEntity;
    }

    public function authentication(AuthForm $form): UserInterface
    {
        /** @var User $userEntity */
        $userEntity = $this->userManager->findUserByUsername($form->login);
        if (empty($userEntity)) {
            $errorCollection = new Collection;
            $validateErrorEntity = new ValidateErrorEntity;
            $validateErrorEntity->setField('login');
            $validateErrorEntity->setMessage('User not found');
            $errorCollection->add($validateErrorEntity);
            $exception = new UnprocessibleEntityException;
            $exception->setErrorCollection($errorCollection);
            throw $exception;
        }
        $this->verificationPassword($userEntity, $form->password);
        $token = $this->forgeToken($userEntity);
        //$token = StringHelper::generateRandomString(64);
        $userEntity->setApiToken($token);
        return $userEntity;
    }

    private function verificationPassword(UserInterface $userEntity, string $password): bool
    {
        $isValidPassword = $this->security->validatePassword($password, $userEntity->getPassword());
        if ( ! $isValidPassword) {
            $errorCollection = new Collection;
            $validateErrorEntity = new ValidateErrorEntity;
            $validateErrorEntity->setField('password');
            $validateErrorEntity->setMessage('Bad password');
            $errorCollection->add($validateErrorEntity);
            $exception = new UnprocessibleEntityException;
            $exception->setErrorCollection($errorCollection);
            throw $exception;
        }
        return $isValidPassword;
    }

    private function forgeToken(UserInterface $userEntity)
    {
        $jwtEntity = new JwtEntity;
        $jwtEntity->subject = ['id' => $userEntity->getId()];
        $token = 'jwt ' . $this->jwtService->sign($jwtEntity, 'auth');
        return $token;
    }
}