<?php
/**
 * 
 *
 * 
 * @author Gianluca Arbezzano
 */
class Application_Validate_IsUserConnect
    extends Zend_Validate_Abstract
{
    /**
     * Error
     * @var test error
     */
    const NOT_VALID = 'notValid';
    
    /**
     * @var messageTemplates
     */
    protected $_messageTemplates = array(
        self::NOT_VALID => 'User \'%value%\' is already connected!'
    );
    
    /**
     * Find user is already insert into db
     *
     * @return bool
     */
    public function isValid($value, $context = null)
    {
        $this->_setValue($value);
        $model = new Application_Model_Name();
        $count = $model->controllerUser($value);
        
        if($count) {
            $this->_error(self::NOT_VALID);
            return false;
        }
        return true;
    }
}