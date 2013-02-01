<?php
namespace Pollo\Application;

use \Pollo\Core\Collection;

/**
 * A container for application configurations
 */
class Config extends Collection
{
    /**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->_setData($data);
    }

    /**
     * Take an array of data and recursively create instances of itself if the value is an array.
     * @param array $data
     */
    protected function _setData(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = new self($value);
            }
            $this[$key] = $value;
        }
    }

    /**
     * Allow access of array values as if they were properties.
     * @param string name
     * @return mixed
     */
    public function __get($name)
    {
        if (!isset($this->_data[$name])) {
            throw new Exception($name . ' does not exist');
        }
        return $this->_data[$name];
    }

    /**
     * Set value to the Config object, create a new instance if the value is an array
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (is_array($value)) {
            $value = new self($value);
        }
        $this->_data[$name] = $value;
    }

    /**
     * Merge a Config object into this current config.
     * The new config will overwrite any values the current config has.
     * If the value is a Config object, it will merge and overwrite the values of that Config instance.
     * @param  Config $config 
     * @return Config
     */
    public function merge(Config $config)
    {
        foreach ($config as $key => $value) {
            if ($this->_data[$key] instanceof Config && $value instanceof Config) {
                $this->_data[$key]->merge($value);
            }
            $this->_data[$key] = $value;
        }
    }

    /**
     * Return this object as an array
     * @return array
     */
    public function toArray()
    {
        $configArray = array();
        foreach ($this->_data as $key => $value) {
            if ($value instanceof self) {
                $value = $value->toArray();
            }
            $configArray[$key] = $value;
        }
        return $configArray;
    }
}