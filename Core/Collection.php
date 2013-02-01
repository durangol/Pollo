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

    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->_data[$key] = $value;
        }
    }

    public function toArray()
    {
        return $this->_data;
    }

    public function count()
    {
        return count($this->_data);
    }

    public function current()
    {
        return current($this->_data);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->_elements);
    }

    public function key()
    {
        return key($this->_data);
    }

    public function next()
    {
        return next($this->_data);
    }

    public function rewind()
    {
        return rewind($this->_data);
    }

    public function valid()
    {
        return isset($this->_data);
    }

    public function offsetExists($offset)
    {
        return isset($this->_data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->_data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->_data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->_data[$offset]);
    }
}