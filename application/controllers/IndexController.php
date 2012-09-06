<?php 
class IndexController extends Zend_Controller_Action
{
    /**
     * @author Gianluca Arbezzano
     * 
     */
    public function indexAction()
    {
        /**
         * Manage form and valid user date
         *
         */
        $request = $this->getRequest();
        $defaultNamespace = new Zend_Session_Namespace('login');
        if(empty($defaultNamespace->id)){
        $form = new Application_Form_Name();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new Application_Model_Name();
                $model->start($form->getValues());
                
                $defaultNamespace->id = $model->getIdByName($form->getValue('name'));
                $this->_helper->redirector->gotoRoute(array('controller'=>'chat', 'action'=>'chat'));
            }
        }
        $this->view->form = $form;
        }
        else {
            $this->_helper->redirector->gotoRoute(array('controller'=>'index', 'action'=>'index'));
        }
    }
}