<?php

namespace Chitaika\AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;

class BooksController extends FOSRestController
{
    /**
     * @View()
     */
    public function getBooksAction()
    {
        $books = $this->getDoctrine()
            ->getRepository('ChitaikaAppBundle:Book')
            ->findAll();

        return $this->view(array('data' => $books));
    }

}
