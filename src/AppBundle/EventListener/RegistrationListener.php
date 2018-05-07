<?php

namespace AppBundle\EventListener;
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 31/03/17
 * Time: 05:29 PM
 */
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener responsible for adding the default user role at registration
 */
class RegistrationListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
            FOSUserEvents::REGISTRATION_FAILURE => 'onRegistrationFailure',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $rolesArr = array('ROLE_USER');

        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();
        $user->setRoles($rolesArr);
    }

  public function onRegistrationFailure(FormEvent $event)
  {

  }
}