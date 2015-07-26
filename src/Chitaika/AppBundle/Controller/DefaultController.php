<?php

namespace Chitaika\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return new Response(
            '<html><body>HELLO!</body></html>'
        );
    }
}
