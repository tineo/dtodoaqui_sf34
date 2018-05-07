<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 13/01/18
 * Time: 08:21 AM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserEditType extends AbstractType{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('firstname');
    $builder->add('lastname');


  }

}