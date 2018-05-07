<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 12/01/18
 * Time: 02:30 PM
 */

namespace AppBundle\Service;


class MessageGenerator extends \ArrayObject {

  private $message;
  /**
   * MessageGenerator constructor.
   */
  public function __construct() {
      $this->message = $this->getHappyMessage();
  }

  public function getHappyMessage()
  {
    $messages = [
      'You did it! You updated the system! Amazing!',
      'That was one of the coolest updates I\'ve seen all day!',
      'Great work! Keep going!',
    ];

    $index = array_rand($messages);

    return $messages[$index];
  }
}