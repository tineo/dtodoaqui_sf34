<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 11/01/18
 * Time: 09:59 PM
 */

namespace AppBundle\Twig\Extension;
use Symfony\Component\DependencyInjection\ContainerInterface;
use \Twig_Extension;

class VarsExtension extends Twig_Extension
{
  protected $container;

  public function __construct(ContainerInterface $container)
{
  $this->container = $container;
}

  public function getName()
{
  return 'some.extension';
}

  // Note: If you want to use it as {{ json_decode(var) }} instead of
  // {{ var|json_decode }} please use getFunctions() and
  // new \Twig_SimpleFunction('json_decode', 'json_decode')
  public function getFilters() {
  return [
    // Note that we map php json_decode function to
    // extension filter of the same name
    new \Twig_SimpleFilter('json_decode', 'json_decode'),
  ];
}
}