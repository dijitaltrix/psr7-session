<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2015-11-13
 * Time: 2:04 PM
 */

namespace Geggleto\Middleware;

use SessionHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Session
{
    /**
     * Store the session handler
     *
     * @var object
     */
    protected $session;

    public function __construct (SessionHandlerInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $requestInterface
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param callable                                 $next
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(
        ServerRequestInterface $requestInterface,
        ResponseInterface $response,
        callable $next) {

        foreach ($this->session as $k => $value) {
            $requestInterface = $requestInterface->withAttribute($k, $value);
        }

        return $next($requestInterface, $response);
    }
}