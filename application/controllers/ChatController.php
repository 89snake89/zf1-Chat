<?php
class ChatController extends Zend_Controller_Action
{
    /**
     * Control parts of chat for example insert messages and logout
     * 
     * @author Gianluca Arbezzano
     */
    
    public function chatAction()
    {
        /**
         * Send a view insert message form
         */
        $request = $this->getRequest();
        $defaultNamespace = new Zend_Session_Namespace('login');
        if($defaultNamespace->id != null){
        $page = $this->_getParam('page', 1);
        $form = new Application_Form_Chat();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new Application_Model_Messages();
                $model->sendMessage($form->getValues());
            }
        }
        $messages = new Application_Model_Messages();
        $paginator = Zend_Paginator::factory($messages->findView());
        $paginator->setItemCountPerPage(100);
        $paginator->setCurrentPageNumber($page);
        $this->view->entries = $paginator;
        $this->view->form = $form;
        } else {
            $this->_helper->redirector->gotoRoute(array('controller'=>'index', 'action'=>'index'));
        }
    }
    
    public function logoutAction()
    {
        /**
         * Execute Logout, clean a Login Session
         */
        $defaultNamespace = new Zend_Session_Namespace('login');
        $defaultNamespace->unsetAll();
        $this->forward('index', 'index');
    }
    
}