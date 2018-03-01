<?php 
class Singleton
{
    const DOMAIN = 'relia';
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance)
        {
            $instance = new static();
        }
        return $instance;
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }
}
