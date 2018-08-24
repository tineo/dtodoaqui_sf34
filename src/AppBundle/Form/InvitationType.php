<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 14/01/18
 * Time: 10:03 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\FormBuilderInterface;

class InvitationType extends AbstractType{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('task')
      ->add('dueDate', null, array('widget' => 'single_text'))
      ->add('save', SubmitType::class);

  }

}