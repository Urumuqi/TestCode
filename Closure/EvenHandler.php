<?php
/**
 * from php.net.
 */

/**
 * Encapsulates a closure.
 */
final class Delegate
{
    private $_Closure;

    /**
     * construct.
     *
     * @param Callable $closure
     */
    public function __construct($closure)
    {
        // $this->_Closure = \Closure::fromCallable($closure);
        // $this->_Closure = new \Closure::($closure);
        $this->_Closure = $closure;
    }

    /**
     * Allows to call the delegate object directly.
     *
     * @param list ...$args variable numbers of arguments.
     *
     * @return mixed
     */
    public function __invoke(...$args)
    {
        return call_user_func_array($this->_Closure, $args);
    }
}

/**
 * defines a type for event arguments.
 */
class EventArgs
{
    protected $_Sender;

    /**
     * construct.
     *
     * @param mixed $sender
     */
    public function __construct($sender = null)
    {
        $this->_Sender = $sender;
    }

    /**
     * property-read.
     *
     * @return object should contain the event emitting object.
     */
    final public function Sender()
    {
        return $this->_Sender;
    }
}

/**
 * a basic event type for the delegate.
 */
class Event
{
    private $_Receivers = array();

    /**
     * Undocumented function
     *
     * @param Delegate $delegate
     *
     * @return Event
     */
    final public function Add(Delegate $delegate)
    {
        $this->_Receivers[] = $delegate;
        return $this;
    }

    /**
     * fires the event.
     *
     * @param EventArgs $args
     *
     * @return void
     */
    final public function Trigger(EventArgs $args)
    {
        foreach ($this->_Receivers as $delegate) {
            $delegate($args);
        }
    }
}

// declare anonymous function as delegate.
$myDelegate = new Delegate(function(EventArgs $args) {
    echo 'anonymous function' . PHP_EOL;
});

// declare event, assign the delegate, trigger event.
$myEvent = new Event();
$myEvent->Add($myDelegate);

/**
 * Defines a simple type that can handle events.
 */
class DemoEventHandler
{
    public function onEvent(EventArgs $args)
    {
        echo 'class event handler' . PHP_EOL;
    }
}

// test event handler
$controller = new DemoEventHandler();
$myEvent->Add(new Delegate(array($controller, 'onEvent')));
$myEvent->Trigger(new EventArgs($myEvent));
