<?php

namespace LDH;

class Route
{
    public function __construct(
        private readonly string $path,
        private readonly string $controller,
        private readonly string $action
    ) {
    }

    public function getPath() : string
    {
        return $this->path;
    }

    public function getController() : string
    {
        return $this->controller;
    }

    public function getAction() : string
    {
        return $this->action;
    }
}
