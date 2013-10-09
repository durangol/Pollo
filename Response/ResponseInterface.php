<?php

namespace Pollo\Response;

interface ResponseInterface
{
    /**
     * This should send the actual response
     */
    public function send();
}