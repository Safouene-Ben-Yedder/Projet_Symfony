<?php
namespace App\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;


class LoginListener {
  private $em;

  public function __construct(EntityManagerInterface $em) {
    $this->em = $em;
  }

  public function onSecurityAuthenticationSuccess(AuthenticationEvent $event) {
    $user = $event->getAuthenticationToken()->getUser();

    if ($user instanceof User) {
      
      $date = new \Datetime();
      $expiration ="90";
      $date_expiration = date_add(new \Datetime(), date_interval_create_from_date_string("$expiration days"));
        
      if ($date < $date_expiration) {
            $user->setDateLastLogin($date);
            $this->em->persist($user);
            $this->em->flush();
        } else {
            $this->em->remove($user);
            $this->em->flush();
      }
    }
  }
}