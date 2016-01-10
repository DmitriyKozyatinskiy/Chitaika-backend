<?php

namespace Chitaika\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Guzzle\Http\Client;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $pageLoader = $this->get('page_loader');

        //Temp, move it to console command later
        $itemsNumber = $pageLoader->getGenres();

//        $client = new Client('http://www.litmir.co');
//        $request = $client->get('/all_genre');
//        $response = $request->send();
//        $result = $response->getBody();

        return new Response(
            542
        );
    }
}
