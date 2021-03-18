<?php
Mage::loadFileByClassName('Model_Core_Session');
//Mage::loadFileByClassName('Model_Core_Message_Trait');
class Model_Core_Message extends Model_Core_Session
{
    // protected $success = null;
    // protected $failure = null;
    public function setSuccess($message)
    {
        $this->success = $message;

        return $this;
    }
    public function getSuccess()
    {

        return $this->success;
    }
    public function setFailure($message)
    {
        $this->failure = $message;
        return $this;
    }
    public function getFailure()
    {
        return $this->failure;
    }
    public function clearSuccess()
    {
        unset($this->success);
        return $this;
    }
    public function clearFailure()
    {
        unset($this->failure);
        return $this;
    }

}