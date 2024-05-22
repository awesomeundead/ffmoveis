<?php

return function ($route)
{
    $route->get('/[acabamentos]', function ()
    {
        require ROOT . '/views/acabamentos/index.html';
    });

    $route->get('/contato', function ()
    {
        require ROOT . '/views/contato/index.html';
    });

    $route->get('/moveis', function ()
    {
        require ROOT . '/views/moveis/index.html';
    });
};