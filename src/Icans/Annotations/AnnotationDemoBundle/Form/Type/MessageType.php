<?php
/**
 * Declares MessageType
 *
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\DiExtraBundle\Annotation\FormType;

/**
 * Implements a Form for a message.
 * @FormType
 */
class MessageType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
            'message',
            'textarea',
            array('attr' => array(
                'placeholder' => 'Enter message here...',
            ))
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'icans_annotations_annotationdemo_message';
    }
}