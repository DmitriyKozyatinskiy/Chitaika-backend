<?php

namespace Chitaika\AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

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
