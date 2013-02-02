<?php
namespace Pollo\Core;

/**
 * An object representation of an array
 */
class Collection implements \Countable, \IteratorAggregate, \ArrayAccess
{
    /**
     * Container
     * @var array
     */
    protected $_data = array();

    /**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->_data[$key] = $value;
        }
    }

    /**
     * Returns the array
     * @return array
     */
    public function toArray()
    {
        return $this->_data;
    }

    /**
     * Implementing Countable
     * @return integer
     */
    public function count()
    {
        return count($this->_data);
    }

    /**
     * Returns current index of the iterator
     * @return mixed
     */
    public function current()
    {
        return current($this->_data);
    }

    /**
     * Implementing IteratorAggregate
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->_data);
    }

    /**
     * Returns the key of the current element
     * @return mixed
     */
    public function key()
    {
        return key($this->_data);
    }

    /**
     * Moves the pointer to the next position
     * @return mixed
     */
    public function next()
    {
        return next($this->_data);
    }

    /**
     * Checks if the offset exists
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->_data[$offset]);
    }

    /**
     * Gets the offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->_data[$offset];
    }

    /**
     * Sets a value at the offset position
     */
    public function offsetSet($offset, $value)
    {
        $this->_data[$offset] = $value;
    }

    /**
     * Unsets an element at the offset position
     */
    public function offsetUnset($offset)
    {
        unset($this->_data[$offset]);
    }
}