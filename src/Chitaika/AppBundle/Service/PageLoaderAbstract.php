<?php

namespace Chitaika\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializationContext;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\DomCrawler\Crawler;


abstract class PageLoaderAbstract
{
    /**
     * @var Registry
     */
    protected $doctrine;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var Client
     */
    protected $guzzleClient;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var Serializer
     */
    protected $serializer;

    public function __construct(
        Registry $doctrine,
        Client $guzzleClient,
        Serializer $serializer,
        Logger $logger
    )
    {
        $this->doctrine = $doctrine;
        $this->guzzleClient = $guzzleClient;
        $this->serializer = $serializer;
        $this->logger = $logger;

        $this->entityManager = $doctrine->getManager();
        // $this->serializer = new Serializer();
    }

    /**
     * Load page.
     *
     * @param string $url
     *
     * @return string|boolean
     */
    public function getPage($url)
    {
        try {
            $request = $this->guzzleClient->get($url);
            $response = $request->send();
            $page = $response->getBody(true);
            $this->logger->info('Page "' . $url . '" was loaded.');
            return $page;
        } catch (\Exception $e) {
            $this->logger->error('Failed to load page "' . $url . '"; \nError: ' . $e->getMessage());
            return false;
        }
    }
}