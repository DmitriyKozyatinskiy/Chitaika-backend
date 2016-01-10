<?php
//
//namespace Chitaika\AppBundle\Service;
//
//use Doctrine\Bundle\DoctrineBundle\Registry;
//use Guzzle\Http\Exception\BadResponseException;
//use Guzzle\Http\Exception\ClientErrorResponseException;
//use Guzzle\Http\Exception\ServerErrorResponseException;
//use Guzzle\Service\Client;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//use JMS\Serializer\Serializer;
//use JMS\Serializer\SerializationContext;
//use Symfony\Bridge\Monolog\Logger;
//use Symfony\Component\DomCrawler\Crawler;
//use Chitaika\AppBundle\Entity\Genre;
//
//class PageLoader extends PageLoaderAbstract
//{
//    const GENRES_URL = 'http://www.litmir.co/all_genre';
//
//    public function __construct(
//        Registry $doctrine,
//        Client $guzzleClient,
//        Crawler $crawler,
//        Serializer $serializer,
//        Logger $logger
//    )
//    {
//        parent::__construct(
//            $doctrine,
//            $guzzleClient,
//            $crawler,
//            $serializer,
//            $logger
//        );
//    }
//
//    public function getGenres($url)
//    {
//        $page = $this->getPage(self::GENRES_URL);
//        $this->$crawler = new Crawler($page);
//
//        $crawler->filter('[jq=main_content] table tr td > a')->each(function (Crawler $node) {
//            $genre = new Genre();
//            $genre->setName($node->text());
//
//            $genre->setUrl($node->attr('href'));
//
//            $this->entityManager->persist($genre);
//            $this->entityManager->flush();
//
//            $parentId = $genre->getId();
//
//            $node->nextAll('ul')->eq(0)->filter('a')->each(function (Crawler $node) use ($parentId) {
//                $genre = new Genre();
//                $genre->setParentId($parentId);
//                $genre->setName($node->filterXPath('//text()')->text());
//                $genre->setUrl($node->attr('href'));
//                $this->entityManager->persist($genre);
//            });
//            $this->entityManager->flush();
//        });
//
//        return 'okay';
//    }
//}