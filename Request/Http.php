<?php

namespace Pollo\Request;

use \Pollo\Application\Mvc\Router\Route\RouteInterface;

/**
 * A wrapper for HTTP requests
 */
class Http
{
    /**
     * The route for the request
     * @var \Pollo\Application\Mvc\Router\Route\RouteInterface
     */
    protected $_route;

    /**
     * Get route
     * @return \Pollo\Application\Mvc\Router\Route\RouteInterface
     */
    public function getRoute()
    {
        return $this->_route;
    }

    /**
     * Set route
     * @param \Pollo\Application\Mvc\Router\Route\RouteInterface $route
     */
    public function setRoute(RouteInterface $route)
    {
        $this->_route = $route;
    }

    /**
     * Returns the $_GET superglobal
     * @return array
     */
    public function getParams()
    {
        return $_GET;
    }

    /**
     * Gets an element of $_GET with an index of $id
     * @param string $id
     * @return mixed
     */
    public function getParam($id)
    {
        return isset($_GET[$id]) ? $_GET[$id] : null;
    }

    /**
     * Sets value to $_GET superglobal
     * @param string $id
     * @param mixed  $value
     */
    public function setParam($id, $value)
    {
        $_GET[$id] = $value;
    }

    /**
     * Wrapper for setGetParam
     * @param array $get
     */
    public function setParams(array $get)
    {
        foreach ($get as $key => $value) {
            $this->setParam($key, $value);
        }
    }

    /**
     * Returns the $_POST superglobal
     * @return array
     */
    public function getPost()
    {
        return $_POST;
    }

    /**
     * Returns a post parameter
     * @param string $id
     * @return mixed
     */
    public function getPostParam($id)
    {
        return isset($_POST[$id]) ? $_POST[$id] : null;
    }

    /**
     * Sets a parameter to $_POST
     * @param string $id
     * @param string $value
     */
    public function setPostParam($id, $value)
    {
        $_POST[$id] = $value;
    }

    /**
     * Wrapper for setPostParam
     * @param array $post
     */
    public function setPostParams(array $post)
    {
        foreach ($post as $key => $value) {
            $this->setPostParam($key, $value);
        }
    }

    /**
     * Returns the $_SERVER superglobal
     * @return array
     */
    public function getServer()
    {
        return $_SERVER;
    }

    /**
     * Returns the $_COOKIE superglobal
     * @return array
     */
    public function getCookie()
    {
        return $_COOKIE;
    }

    /**
     * Returns a header
     * @param string $id
     * @return string
     */
    public function getHeader($id)
    {
        $headers = $this->getHeaders();
        return $headers[$id];
    }

    /**
     * Returns an the array of headers
     * @return array
     */
   public function getHeaders()
    {
        $headers = array();
        foreach (headers_list() as $header) {
            list($key, $value) = explode(':', $header);
            $headers[$key] = $value;
        }
        return $headers;
    }

    /**
     * Gets the request method
     * @return string
     */
    public function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Checks whether the request method is get
     * @return bool
     */
    public function isGet()
    {
        return $this->getRequestMethod() == 'GET';
    }

    /**
     * Checks whether the request method is post
     * @return bool
     */
    public function isPost()
    {
        return $this->getRequestMethod() == 'POST';
    }

    /**
     * Checks whether the request method is put
     * @return bool
     */
    public function isPut()
    {
        return $this->getRequestMethod() == 'PUT';
    }

    /**
     * Checks whether the request method is delete
     * @return bool
     */
    public function isDelete()
    {
        return $this->getRequestMethod() == 'DELETE';
    }

    /**
     * Checks whether the request method is head
     * @return bool
     */
    public function isHead()
    {
        return $this->getRequestMethod() == 'HEAD';
    }

    /**
     * Checks whether the request method is options
     * @return bool
     */
    public function isOptions()
    {
        return $this->getRequestMethod() == 'OPTIONS';
    }

    /**
     * Checks whether the request is an ajax request
     * @return bool
     */
    public function isAjax()
    {
        return $this->getHeader('X_REQUESTED_WITH') == 'XMLHttpRequest';
    }
}