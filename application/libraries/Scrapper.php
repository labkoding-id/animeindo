<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;    
use Symfony\Component\DomCrawler\Crawler;
class Scrapper{

    public function start($params = ""){

        $target  = "https://animeindo.asia/";
        $client  = new Client();
        $crawler = $client->request('GET', $target.$params);
        return $crawler;
    }


}