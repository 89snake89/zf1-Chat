<?php
class Application_Model_Name
extends Zend_Db_Table_Abstract
{
    /**
     * Manage users
     * 
     * @var $_primary primary key
     * @var $_name name table
     */
    protected $_name = 'users';
    protected $_primary = 'id';

    public function start(array $user)
    {
        /*
         * Insert new users if it's not already insert
         * @var array
         */
        if (null != $user) {
            $this->insert($user);
        }
    }
    
    public function controllerUser($user){
        /**
         * Control number of user with = name
         * @var variable
         */
        $row = $this->fetchAll("name = '".$user."'");
        $count = count($row);
        return $count;
    }
    
    public function getIdByName($user){
        /**
         * Insert name return id
         * 
         * @var variable
         */
        $select = $this->select()->where('name = ?', $user);
        $row = $this->fetchRow($select);
        return null === $row ? 0 : $row->id;
    }
    
}