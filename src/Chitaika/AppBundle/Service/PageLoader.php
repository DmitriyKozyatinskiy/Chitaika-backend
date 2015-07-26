<?php

namespace Chitaika\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\ServerErrorResponseException;
use Guzzle\Service\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializationContext;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\DomCrawler\Crawler;
use Chitaika\AppBundle\Entity\Genre;

class PageLoader extends PageLoaderAbstract
{
    const GENRES_URL = 'http://www.litmir.co/all_genre';

    public function __construct(
        Registry $doctrine,
        Client $guzzleClient,
        Serializer $serializer,
        Logger $logger
    )
    {
        parent::__construct(
            $doctrine,
            $guzzleClient,
            $serializer,
            $logger
        );
    }

    public function getGenres()
    {
        $page = $this->getPage(self::GENRES_URL);
        $crawler = new Crawler($page);

        $crawler->filter('[jq=main_content] table tr td > a')->each(function (Crawler $node) {
            $genre = new Genre();
            $genre->setName($node->text());
            $genre->setUrl($node->attr('href'));
            $this->entityManager->persist($genre);
            $parentId = $genre->getId();

            $node->nextAll('ul')->eq(0)->filter('a')->each(function (Crawler $node) use ($parentId) {
                $genre = new Genre();
                $genre->setParentId($parentId);
                $genre->setName($node->filterXPath('//text()')->text());
                $genre->setUrl($node->attr('href'));
                $this->entityManager->persist($genre);
            });
        });
        $itemsNumber = count($this->entityManager->getUnitOfWork()->getScheduledEntityInsertions());
        $this->entityManager->flush();
        $this->logger->info($itemsNumber . ' genres from page "' . self::GENRES_URL . '" were saved.');

        return $itemsNumber;
    }
}