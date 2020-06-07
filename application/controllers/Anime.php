<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;    
use Symfony\Component\DomCrawler\Crawler;
class Anime extends CI_Controller {

    function __option($params = ""){
        $target  = "https://animeindo.asia/";
        $client  = new Client();
        return $client->request('GET', $target.$params);
    }

    public function list($slug){
        $crawler = $this->__option('anime/'.$slug);
        
        $data['sinopsis']           =   $crawler->filter('.sinops')->text();
        $data['desc']               =   $crawler->filter('.infx')->each(function (Crawler $parentCrawler, $i) {
                                        return $parentCrawler->text();
        });
        $data['episode']            = $crawler->filter('.episode_list')->each(function (Crawler $parentCrawler, $i) {
            $data['link']           = $parentCrawler->filter('a')->attr('href');
            $data['title']          = $parentCrawler->filter('a')->attr('title');
        return $data;
        });
        $data['poster']             = $crawler->filter('.cat_image > img')->attr('data-src');
        $data['title']              = $crawler->filter('.entry-title')->text();
        $meta                       = array(
            'title'                 => 'Animeindo - Anime '.$data['title'],
            'description'           => $crawler->filterXpath('//meta[@property="og:description"]')->attr('content'),
            'og_title'              => 'Animeindo - Anime '.$data['title'],
            'og_url'                => base_url('anime/').$slug,
        );
        $this->template->_flixgo('anime', $data,$meta);
           
    }

    public function all(){
        $crawler                    = $this->__option('list-anime/');  
        $data['all']                = $crawler->filter('.east_list')->each(function (Crawler $parentCrawler, $i) {
            $data['letter']         = trim($parentCrawler->filter('h1')->attr('id'));
            $data['list']           = $parentCrawler->filter('.eastlist')->each(function (Crawler $childCrawler, $i) {
                $data['link']       = $childCrawler->filter('.alist')->attr('href');
                $data['title']      = $childCrawler->filter('.alist')->text();
                return $data;
            });
            return $data;
        });

        $this->template->_flixgo('animes', $data);
        
    }

    function search(){
        $value = $this->input->post('search');
        $crawler                       = $this->__option('?s='.$value);
        $data['result']                = $crawler->filter('.animepost')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/anime/',base_url('anime/'),$parentCrawler->filter('.tip')->attr('href'));
            $data['title']             = $parentCrawler->filter('.tt')->text();
            $data['type']              = $parentCrawler->filter('.type')->text();
            $data['images']            = $parentCrawler->filter('img')->attr('data-src');
            return $data;
        }); 
        $data['value']                 = $value;  
        $data['current']               = '1';  
        $data['pages']                 = $crawler->filter('.pages')->count() > 0 ? $crawler->filter('.pages')->text() : '1';
        $data['number']                = '1';
        $meta                          =  array(
            'title'                    => 'Animeindo - Search '.$value,
            'og_title'                 => 'Animeindo - Search '.$value,
            'og_url'                   => base_url('search/?s=').$value,
        );
        if(!empty($data['result'])){

            $this->template->_flixgo('search', $data,$meta);
        }else{
            redirect('error', 'refresh');
        }

    }

    public function search_page($value,$page){
        $crawler   = $this->__option('page/'.$page.'/?s='.$value);
        $data['result']                = $crawler->filter('.animepost')->each(function (Crawler $parentCrawler, $i) {
            $data['link']              = str_replace('https://animeindo.asia/anime/',base_url('anime/'),$parentCrawler->filter('.tip')->attr('href'));
            $data['title']             = $parentCrawler->filter('.tt')->text();
            $data['type']              = $parentCrawler->filter('.type')->text();
            $data['images']            = $parentCrawler->filter('img')->attr('data-src');
            return $data;
        }); 
        $data['value']                 = $value;  
        $data['current']               = $page;  
        $data['pages']                 = $crawler->filter('.pages')->text();
        $data['number']                = $page;
        $meta                          =  array(
            'title'                    => 'Animeindo - Search '.$value,
            'og_title'                 => 'Animeindo - Search '.$value,
            'og_url'                   => base_url('search/?s=').$value,
        );
        if(!empty($data['result'])){

            $this->template->_flixgo('search', $data,$meta);
        }else{
            redirect('error', 'refresh');
        }
    }

   

}