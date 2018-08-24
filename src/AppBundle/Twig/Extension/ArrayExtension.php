<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 11/01/18
 * Time: 10:33 PM
 */

namespace AppBundle\Twig\Extension;
use \Twig_Extension;

class ArrayExtension extends Twig_Extension{
  /**
   * @inheritDoc
   */
  public function getFilters()
  {
    return array(
      new \Twig_SimpleFilter('cast_to_array', array($this, 'castToArray'))
    );
  }

  public function castToArray($stdClassObject) {
    $response = array();
    foreach ($stdClassObject as $key => $value) {
      $response[$key] = $value;
    }
    return $response;
  }


  /**
   * Returns the name of the extension.
   *
   * @return string The extension name
   */
  public function getName()
  {
    return 'array_extension';
  }
}