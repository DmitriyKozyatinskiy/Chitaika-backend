<?php

namespace Chitaika\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializationContext;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\DomCrawler\Crawler;
use Chitaika\AppBundle\Entity\Genre;

class PageLoader extends PageLoaderAbstract
{
    const GENRES_URL = 'https://www.facebook.com';

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
        $client = new Client([
            'verify' => false,
            'cookies' => true,
            'synchronous' => true
        ]);

        $headers = [
            'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'accept-encoding' => 'gzip, deflate',
            'accept-language' => 'en-US,en;q=0.8,ru;q=0.6,uk;q=0.4',
            'cache-control' => 'no-cache',
            'content-length' => 142,
            'content-type' => 'application/x-www-form-urlencoded',
            'cookie' => 'datr=vc7MVYlw-wStztYipgXe90q_; a11y=%7B%22sr%22%3A0%2C%22sr-ts%22%3A1441890312054%2C%22jk%22%3A0%2C%22jk-ts%22%3A1441890312054%2C%22kb%22%3A0%2C%22kb-ts%22%3A1449401621627%2C%22hcm%22%3A0%2C%22hcm-ts%22%3A1441890312054%7D; locale=ru_RU; fr=0INsv2XK7zgpaOGZt.AWWdOfap93Zsc0qdWRHZLqkAjFk.BVzM7h.4-.AAA.0.AWUCqcRs; lu=RAfITcst3Q2b2U7fjmDye8mA; noscript=1',
            'origin' => 'https://www.facebook.com',
            'pragma' => 'no-cache',
            'referer' => 'https://www.facebook.com/?stype=lo&jlou=AffFChr21KOdDanP74wXQl4-pxg54gu6YOU2Ks1lcNs0awNtXiQPSnwzaJZ79gXL87DnGtCl2AayIPeDyUTHqVJlLaLXUcFgkJpNWOAtJqKOJg&smuh=1051&lh=Ac_amla-EDSAINyi&_fb_noscript=1',
            'upgrade-insecure-requests' => 1,
            'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36',
            'form_params' => [
                'email' => 'dmitriy.kozyatinskiy@gmail.com',
                'pass' => '210795',
                'persistent' => 1,
                'locale' => 'en_EN',
                'lsd' => 'AVoQs-vm',
                // 'lgnrnd' => '123731_WWLE',
                // 'lgnjs' => 'n'
            ]
        ];

        $response = $client->request('POST', 'https://m.facebook.com/login.php', $headers);
        $place = $client->request('POST', 'https://m.facebook.com/editprofile/exp/work/createwithcity/?eref=m_basic_profile&session_id=9a566a37ee37cb5d3acb&gfid=AQBwCm3RDQZ0fyKF', [
            'form_params' => [
                'fb_dtsg' => 'AQFu230cgrHh',
                'charset_test' => '€,´,€,´,水,Д,Є',
                'city_id' => '155085151195111',
                'hub_name' => 'HELLOooo',
                'address' => 'safafoo',
                'zip' => 'SDFSFoo',
                'save' => 'Сохранить место'
            ]
        ]);
        $job = $client->request('POST', 'https://m.facebook.com/editprofile/exp/work/save.php?eref=m_basic_profile&session_id=9a566a37ee37cb5d3acb&is_new=1', [
            'form_params' => [
                'fb_dtsg' => 'AQGQBVl5N7DD',
                'charset_test' => '€,´,€,´,水,Д,Є',
                'position' => 'Dimka',
                'start_month' => '-1',
                'start_day' => '-1',
                'start_year' => '-1',
                'current' => 'on',
                'end_month' => '-1',
                'end_day' => '-1',
                'end_year' => '-1',
                'exp_id' => '1086410034724403'
            ]
        ]);

        return $job->getBody();//$response->getBody();//$itemsNumber;
    }
}