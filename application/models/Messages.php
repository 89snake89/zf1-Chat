<?php
class Application_Model_Messages
extends Zend_Db_Table_Abstract
{
    /**
     * Manage Message query
     * 
     * @author Gianluca Arbezzano
     * @var $_name nome della tabella
     * @var $_primary chiave primaria
     */
    
    protected $_name = 'messages';
    protected $_primary = 'id';

    public function sendMessage(array $message){
        
        /**
         * Insert into messages table new record
         * 
         * @var Array
         */
        $defaultNamespace = new Zend_Session_Namespace('login');
        $dato = array(
            'id'        => null,
            'idu'      => $defaultNamespace->id,
            'message' => $message['message']
        );
        $this->insert($dato);
    }

    public function findView(){
        /**
         * Query find record to print in view
         * @return var
         */
        $query = $this->select()->setIntegrityCheck(false)
        ->from(array('m' => 'messages'))
        ->joinleft(array('u' => 'users'), 'm.idu = u.id');
        //$messages = $this->fetchAll($query);
        //return $messages;
        return $query;
    }
}