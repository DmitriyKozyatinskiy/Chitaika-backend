<?php

namespace Chitaika\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ExceptionController extends Controller
{
    public function redirectAction(Request $request)
    {
        return $this->render('ChitaikaAppBundle:Default:index.html.twig');
    }
}
