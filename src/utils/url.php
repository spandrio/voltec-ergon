<?php

use Psr\Http\Message\ServerRequestInterface;

function baseUrl(ServerRequestInterface $request): string
{
  $uri = $request->getUri();

  return $uri->getScheme() . "://" . $uri->getAuthority();
}
