<?php
class Application_Form_Name extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add the comment element
        $this->addElement('text', 'name', array(
            'label'      => 'You choose Nik Name:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20)),
                new Application_Validate_IsUserConnect()
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Enter',
        ));
        
    }
}