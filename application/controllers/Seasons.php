<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;    
use Symfony\Component\DomCrawler\Crawler;
class Seasons extends CI_Controller {

    function __option($params = ""){
        $target  = "https://animeindo.asia/";
        $client  = new Client();
        return $client->request('GET', $target.$params);
    }

    public function index(){
        $crawler                       = $this->__option('season/');  
        $data['result']                = $crawler->filter('.gnrs')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/season/',base_url('season/'),$parentCrawler->filter('.genrtil')->attr('href'));
            $data['name']              = $parentCrawler->filter('.termst')->text();
            return $data;
        });

        $this->template->_flixgo('seasons', $data);
           
    }

    public function season($season){
        $crawler                       = $this->__option('season/'.$season); 
        $data['result']                = $crawler->filter('.animepost')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/anime/',base_url('anime/'),$parentCrawler->filter('.tip')->attr('href'));
            $data['title']             = $parentCrawler->filter('.tt')->text();
            $data['type']              = $parentCrawler->filter('.type')->text();
            $data['images']            = $parentCrawler->filter('img')->attr('data-src');
            return $data;
        }); 
        $data['season']                = $season;  
        $data['current']               = '1';  
        $data['pages']                 = $crawler->filter('.pages')->count() > 0 ? $crawler->filter('.pages')->text() : '1';
        $data['number']                = '1';
        $meta                          = array(
            'title'                    => 'Animeindo - Season '.$season,
            'og_title'                 => 'Animeindo - Season '.$season,
            'og_url'                   => base_url('season/').$season,
        );
        $this->template->_flixgo('season', $data,$meta);

        
    }

    public function season_page($season,$page){
        $crawler   = $this->__option('season/'.$season.'/page/'.$page); 
        $data['result']                = $crawler->filter('.animepost')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/anime/',base_url('anime/'),$parentCrawler->filter('.tip')->attr('href'));
            $data['title']             = $parentCrawler->filter('.tt')->text();
            $data['type']              = $parentCrawler->filter('.type')->text();
            $data['images']            = $parentCrawler->filter('img')->attr('data-src');
            return $data;
        }); 
        $data['season']                = $season;  
        $data['current']               = $page;  
        $data['pages']                 = $crawler->filter('.pages')->text();
        $data['number']                = $page;
        $meta                          = array(
            'title'                    => 'Animeindo - Genre '.$season,
            'og_title'                 => 'Animeindo - Genre '.$season,
            'og_url'                   => base_url('season/').$season,
        );
        $this->template->_flixgo('season', $data,$meta);
    }

   

}