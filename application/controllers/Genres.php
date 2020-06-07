<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;    
use Symfony\Component\DomCrawler\Crawler;
class Genres extends CI_Controller {

    function __option($params = ""){
        $target  = "https://animeindo.asia/";
        $client  = new Client();
        return $client->request('GET', $target.$params);
    }

    public function index(){
        $crawler                       = $this->__option('genre/');  
        $data['result']                = $crawler->filter('.gnrs')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/genre/',base_url('genre/'),$parentCrawler->filter('.genrtil')->attr('href'));
            $data['name']              = $parentCrawler->filter('.termst')->text();
            return $data;
        });
        $this->template->_flixgo('genres', $data);
           
    }

    public function genre($genre){
        $crawler                       = $this->__option('genre/'.$genre); 
        $data['result']                = $crawler->filter('.animepost')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/anime/',base_url('anime/'),$parentCrawler->filter('.tip')->attr('href'));
            $data['title']             = $parentCrawler->filter('.tt')->text();
            $data['type']              = $parentCrawler->filter('.type')->text();
            $data['images']            = $parentCrawler->filter('img')->attr('data-src');
            return $data;
        }); 
        $data['genre']                 = $genre;  
        $data['current']               = '1';  
        $data['pages']                 = $crawler->filter('.pages')->text();
        $data['number']                = '1';
        $meta                          = array(
            'title'                    => 'Animeindo - Genre '.$genre,
            'og_title'                 => 'Animeindo - Genre '.$genre,
            'og_url'                   => base_url('genre/').$genre,
        );
        $this->template->_flixgo('genre', $data,$meta);

        
    }

    public function genre_page($genre,$page){
        $crawler   = $this->__option('genre/'.$genre.'/page/'.$page); 
        $data['result']                = $crawler->filter('.animepost')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/anime/',base_url('anime/'),$parentCrawler->filter('.tip')->attr('href'));
            $data['title']             = $parentCrawler->filter('.tt')->text();
            $data['type']              = $parentCrawler->filter('.type')->text();
            $data['images']            = $parentCrawler->filter('img')->attr('data-src');
            return $data;
        }); 
        $data['genre']                 = $genre;  
        $data['current']               = $page;  
        $data['pages']                 = $crawler->filter('.pages')->text();
        $data['number']                = $page;
        $meta                          = array(
            'title'                    => 'Animeindo - Genre '.$genre,
            'og_title'                 => 'Animeindo - Genre '.$genre,
            'og_url'                   => base_url('genre/').$genre,
        );
        $this->template->_flixgo('genre', $data,$meta);
    }

   

}