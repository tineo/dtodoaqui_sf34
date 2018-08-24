<?php

/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 21/03/17
 * Time: 09:51 AM
 */

namespace AppBundle\Security\Core\User;

use AppBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseClass;
use Symfony\Component\Security\Core\User\UserInterface;

class FOSUBUserProvider extends BaseClass
{
    /**
     * {@inheritDoc}
     */
    public function connect(UserInterface $user, UserResponseInterface $response)
    {
        $property = $this->getProperty($response);
        $username = $response->getUsername();

        //check fb_id and fb_access_token
        //on connect - get the access token and the user ID
        $service = $response->getResourceOwner()->getName();
        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';


     if
        //we "disconnect" previously connected users
        (null !== $previousUser = $this->userManager->findUserBy(array($property => $username))) {
            $previousUser->$setter_id(null);
            $previousUser->$setter_token(null);
            $this->userManager->updateUser($previousUser);
        }
        //we connect current user
        $user->$setter_id($username);
        $user->$setter_token($response->getAccessToken());
        $this->userManager->updateUser($user);
    }
    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $username = $response->getUsername();
        $email = $response->getEmail();

        $service = $response->getResourceOwner()->getName();
        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';

        //when the user is registrating
        //Verify if email is used
        if (null !==  $user = $this->userManager->findUserBy(array("email" => $email))){
          $user->$setter_id($username);
          $user->$setter_token($response->getAccessToken());
          $user->setEnabled(true);
          $this->userManager->updateUser($user);
        }
        //Verifiy if has previous access_token
        elseif ( null === $user = $this->userManager->findUserBy( array(
          $this->getProperty($response) => $username))
        ) {
          // create new user here
          $user = $this->userManager->createUser();
          $user->$setter_id($username);
          $user->$setter_token($response->getAccessToken());
          //I have set all requested data with the user's username
          //modify here with relevant data
          $user->setFirstname($response->getFirstName());
          $user->setLastname($response->getLastName());
          $user->setEmail($response->getEmail());
          $user->setPassword("__only__fb");
          $user->setEnabled(true);

          $rolesArr = array('ROLE_USER');
          $user->setRoles($rolesArr);

          $this->userManager->updateUser($user);
          return $user;
        }

        //if user exists - go with the HWIOAuth way
        $user = parent::loadUserByOAuthUserResponse($response);
        $serviceName = $response->getResourceOwner()->getName();
        $setter = 'set' . ucfirst($serviceName) . 'AccessToken';
        //update access token
        $user->$setter($response->getAccessToken());
        return $user;
    }
}