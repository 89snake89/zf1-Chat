<?php
class Application_Form_Chat extends Zend_Form{
    public function init(){
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add the comment element
        $this->addElement('text', 'message', array(
            'label'      => 'Message:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 200))
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Send',
        ));
        $this->setElementDecorators(array('viewHelper'));
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' => 'forms/formChat.phtml')),
        ));
    }
}