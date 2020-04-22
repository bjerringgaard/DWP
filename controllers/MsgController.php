<?php
class MsgController{
    public $message;

    public function setMessage($message){
        $this->message[] = $message;
    }

    public function getMessage(){
        return $this->message;
    }
}