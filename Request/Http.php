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

    public function get()
    {
        return $_GET;
    }

    public function getGetParam($id)
    {
        return isset($_GET[$id]) ? $_GET[$id] : null;
    }

    public function setGetParam($id, $value)
    {
        $_GET[$id] = $value;
    }

    public function setGetParams(array $get)
    {
        foreach ($get as $key => $value) {
            $this->setGetParam($key, $value);
        }
    }

    public function getPost()
    {
        return $_POST;
    }

    public function getPostParam($id)
    {
        return isset($_POST[$id]) ? $_POST[$id] : null;
    }

    public function setPostParam($id, $value)
    {
        $_POST[$id] = $value;
    }

    public function setPostParams(array $post)
    {
        foreach ($post as $key => $value) {
            $this->setPostParam($key, $value);
        }
    }

    public function getServer()
    {
        return $_SERVER;
    }

    public function getCookie()
    {
        return $_COOKIE;
    }

    public function getHeader($id)
    {
        $headers = $this->getHeaders();
        return $headers[$id];
    }

    public function setHeader($id, $value)
    {
        header($id . ': ' . $value);
    }

   public function getHeaders()
    {
        $headers = array();
        foreach (headers_list() as $header) {
            list($key, $value) = explode(':', $header);
            $headers[$key] = $value;
        }
        return $headers;
    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->setHeader($key, $value);
        }
    }

    public function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isGet()
    {
        return $this->getRequestMethod() == 'GET';
    }

    public function isPost()
    {
        return $this->getRequestMethod() == 'POST';
    }

    public function isPut()
    {
        return $this->getRequestMethod() == 'PUT';
    }

    public function isDelete()
    {
        return $this->getRequestMethod() == 'DELETE';
    }

    public function isHead()
    {
        return $this->getRequestMethod() == 'HEAD';
    }

    public function isOptions()
    {
        return $this->getRequestMethod() == 'OPTIONS';
    }

    public function isAjax()
    {
        return $this->getHeader('X_REQUESTED_WITH') == 'XMLHttpRequest';
    }
}