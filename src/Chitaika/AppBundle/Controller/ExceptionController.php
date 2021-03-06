<?php

namespace Chitaika\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ExceptionController extends Controller
{
    /**
     * Redirect to home, move slug to url's hash
     */
    public function redirectAction(Request $request)
    {
        $url = $this->generateUrl('home') . '#' . substr($request->getPathInfo(), 1);

        return $this->redirect($url);
    }
}
