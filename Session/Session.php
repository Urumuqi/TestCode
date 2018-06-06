<?php
/**
 * from php.net.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */


class Session
{
    // const
    const SESSION_STARTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;

    // state of session
    private $sessionState = self::SESSION_NOT_STARTED;

    // singleton
    private static $instance;

    /**
     * private constructor.
     */
    private function __construct()
    {
    }

    /**
     * get singleton.
     *
     * @return Session
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Session();
        }
        self::$instance->startSession();
        return self::$instance;
    }

    /**
     * start session.
     *
     * @return boolean session_state
     */
    public function startSession()
    {
        if ($this->sessionState == self::SESSION_NOT_STARTED) {
            $this->sessionState = session_start();
        }
        return $this->sessionState;
    }

    /**
     * save data in $_SESSION.
     *
     * @param mixed $name  data name.
     * @param mixed $value data value.
     */
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * get session data by name.
     *
     * @param mixed $name data name.
     *
     * @return mixed session data value.`
     */
    public function __get($name)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    /**
     * isset.
     *
     * @param mixed $name
     *
     * @return boolean
     */
    public function __isset($name)
    {
        return isset($_SESSSION[$name]);
    }

    /**
     * unset.
     *
     * @param mixed $name
     */
    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * clear session.
     *
     * @return boolean
     */
    public function destroy()
    {
        if ($this->sessionState == self::SESSION_STARTED) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);
            return !$this->sessionState;
        }
        return FALSE;
    }
}
