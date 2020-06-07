<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;    
use Symfony\Component\DomCrawler\Crawler;
class Home extends CI_Controller {

    function __option($params = ""){
        $target  = "https://animeindo.asia/";
        $client  = new Client();
        return $client->request('GET', $target.$params);
    }

    public function index(){
        $crawler = $this->__option();
        $result  = $crawler->filter('.episode')->each(function (Crawler $parentCrawler, $i) {
            $result['image']      = $parentCrawler->filter('span > a > img')->attr('data-src');
            $result['link']       = $parentCrawler->filter('span > a')->attr('href');
            $result['title']      = $parentCrawler->filter('.episode-details > h3')->text();
            $result['publish']    = $parentCrawler->filter('.episode-meta')->count() > 0  ? $parentCrawler->filter('.episode-meta')->text() : "---";
            return $result;
        });

        $paginasi = $crawler->filter('.paginasi > a')->each(function ($node) {
            $paginasi['page']  = $node->attr('href');
            $paginasi['title'] = remove_special_characters($node->text());
            return $paginasi;
        });

        $data = array(
            'anime'         => $result,
            'airing'        => $this->airing(),
            'navigasi'      => $paginasi,
            'current'       => $crawler->filter('.active_smk_link')->text(),
            'pages'         => $crawler->filter('.pages')->text(),
            'number'        => 1,
            
        );
        
        $this->template->_flixgo('home', $data);
           
    }

    public function page($number){
        $crawler = $this->__option('page/'.$number);
        $result  = $crawler->filter('.episode')->each(function (Crawler $parentCrawler, $i) {
            $result['image']      = $parentCrawler->filter('span > a > img')->attr('data-src');
            $result['link']       = $parentCrawler->filter('span > a')->attr('href');
            $result['title']      = $parentCrawler->filter('.episode-details > h3')->text();
            $result['publish']    = $parentCrawler->filter('.episode-meta')->count() > 0  ? $parentCrawler->filter('.episode-meta')->text() : "---";
            return $result;
        });

        $paginasi = $crawler->filter('.paginasi > a')->each(function ($node) {
            $paginasi['page']  = $node->attr('href');
            $paginasi['title'] = remove_special_characters($node->text());
            return $paginasi;
        });

        $data = array(
            'anime'         => $result,
            'airing'        => $this->airing(),
            'navigasi'      => $paginasi,
            'current'       => $crawler->filter('.active_smk_link')->text(),
            'pages'         => $crawler->filter('.pages')->text(),
            'number'        => $number,
            
        );
        
        $this->template->_flixgo('home', $data);
    }

    function airing(){
        $crawler = $this->__option('anime-airing/');
        $result = $crawler->filter('article')->each(function (Crawler $parentCrawler, $i) {
            $result['image']      = $parentCrawler->filter('img')->attr('data-src');
            $result['link']       = $parentCrawler->filter('.animposx > a')->attr('href');
            $result['title']      = $parentCrawler->filter('.tt')->text();
            $result['tipe']       = $parentCrawler->filter('.type')->text();
            return $result;
        });

        return $result;

    }

    function error(){
        $this->load->view('error');
    }

   
   

}