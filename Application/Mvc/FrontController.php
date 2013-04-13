<?php

namespace Pollo\Application\Mvc;
use \Pollo\Application\Mvc\Bootstrap\BootstrapInterface;
use \Pollo\Application\Mvc\Dispatcher\DispatcherInterface;
use \Pollo\Application\Mvc\Router\RouterInterface;

class FrontController
{
	protected static $_instance;
	protected $_bootstrap;
    protected $_router;
	protected $_dispatcher;

	protected function __construct()
	{
	}

	public static function getInstance()
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function setBootstrap(BootstrapInterface $bootstrap)
	{
		$this->_bootstrap = $bootstrap;
		return $this;
	}

    public function setRouter(RouterInterface $router)
    {
        $this->_router = $router;
        return $this;
    }

	public function setDispatcher(DispatcherInterface $dispatch)
	{
		$this->_dispatcher = $dispatch;
		return $this;
	}

	public function dispatch()
	{
		$request = $this->_dispatcher->getRequest();
		if ($this->_router->matchRoute($request)) {
			$this->_dispatcher->dispatch();
			$this->_dispatcher->getResponse()->send();
		}

	}
}