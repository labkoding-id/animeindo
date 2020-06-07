<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;    
use Symfony\Component\DomCrawler\Crawler;
class Stream extends CI_Controller {

    function __option($params = ""){
        $target  = "https://animeindo.asia/";
        $client  = new Client();
        return $client->request('GET', $target.$params);
    }

    public function play($slug){
        $crawler            = $this->__option($slug);
        $details            = $this->info($crawler->filter('.bannerani > a')->attr('href'));
        $video              = $crawler->filter('#ViostreamIframe')->attr('data-src');
        if($crawler->filter('#ViostreamIframe')->count() > 0){
            $videos          = $crawler->filter('#ViostreamIframe')->attr('data-src');
        }else{
            $videos          = "";
        }
        $data               = array(
            'video'     => $video,
            'prev'      => $crawler->filter('.ep-prev > a')->count() > 0 ? $crawler->filter('.ep-prev > a')->attr('href') : "#",
            'next'      => $crawler->filter('.ep-next > a')->count() > 0 ? $crawler->filter('.ep-next > a')->attr('href') : "#",
            'list'      => $crawler->filter('.ep-more > a')->count() > 0 ? $crawler->filter('.ep-more > a')->attr('href') : "#",
            'desc'      => $details['desc'],
            'episode'   => $details['episode'],
            'sinopsis'  => $details['sinopsis'],
            'title'     => $crawler->filter('.entry-title')->text(),
            'qual'      => 'SD',
            'poster'    => $details['image'],
            'slug'      => $slug,
        );  

        $meta               = array(
            'title'                 => 'Animeindo - Streaming '.$data['title'],
            'description'           => $crawler->filterXpath('//meta[@name="description"]')->attr('content'),
            'og_title'              => 'Animeindo - Streaming '.$data['title'],
            'og_url'                => base_url('stream/').$slug,
            'article_section'       => $crawler->filterXpath('//meta[@property="article:section"]')->attr('content'),
            'article_p_time'        => $crawler->filterXpath('//meta[@property="article:published_time"]')->attr('content'),
            'article_m_time'        => $crawler->filterXpath('//meta[@property="article:modified_time"]')->attr('content'),
            'article_u_time'        => $crawler->filterXpath('//meta[@property="og:updated_time"]')->attr('content'),
        );

        $this->template->_flixgo('stream', $data, $meta);
           
    }

    public function playQuality($slug,$qual){
        $crawler        = $this->__option($slug.'/?source='.$qual);
        $details        = $this->info($crawler->filter('.bannerani > a')->attr('href'));

        if($qual == 'mp4upload'  || $qual == 'dailymotion'){

            if($crawler->filter('.videoembedactiveembed')->count() > 0){
                $videos     = $crawler->filter('.videoembedactiveembed > iframe')->attr('data-src');
            }else{
                $videos      = base_url('_themes/').'img/error.jpg'; 
            }
            
        }else if($qual == 'sockshare'){

            if($crawler->filter('#ViostreamIframe')->count() > 0){
                $videos     = $crawler->filter('#ViostreamIframe')->attr('data-src');
            }else{
                $videos      = base_url('_themes/').'img/error.jpg';
            }
        }

        $data           = array(
            'video'     => $videos,
            'prev'      => $crawler->filter('.ep-prev > a')->count() > 0 ? $crawler->filter('.ep-prev > a')->attr('href') : "#",
            'next'      => $crawler->filter('.ep-next > a')->count() > 0 ? $crawler->filter('.ep-next > a')->attr('href') : "#",
            'list'      => $crawler->filter('.ep-more > a')->count() > 0 ? $crawler->filter('.ep-more > a')->attr('href') : "#",
            'desc'      => $details['desc'],
            'episode'   => $details['episode'],
            'sinopsis'  => $details['sinopsis'],
            'title'     => $crawler->filter('.entry-title')->text(),
            'qual'      => $qual,
            'poster'    => $details['image'],
            'slug'      => $slug,
        );  

        $meta               = array(
            'title'                 => 'Animeindo - Streaming '.$data['title'],
            'description'           => $crawler->filterXpath('//meta[@name="description"]')->attr('content'),
            'og_title'              => 'Animeindo - Streaming '.$data['title'],
            'og_url'                => base_url('stream/').$slug,
            'article_section'       => $crawler->filterXpath('//meta[@property="article:section"]')->attr('content'),
            'article_p_time'        => $crawler->filterXpath('//meta[@property="article:published_time"]')->attr('content'),
            'article_m_time'        => $crawler->filterXpath('//meta[@property="article:modified_time"]')->attr('content'),
            'article_u_time'        => $crawler->filterXpath('//meta[@property="og:updated_time"]')->attr('content'),
        );

        $this->template->_flixgo('stream', $meta);

    }

    public function info($slug){
        $client                  =   new Client();
        $crawler                 =   $client->request('GET', $slug);
        $data['sinopsis']        =   $crawler->filter('.sinops')->text();
        $data['desc']            =   $crawler->filter('.infx')->each(function (Crawler $parentCrawler, $i) {
                                     return $parentCrawler->text();
        });
        $data['episode']         = $crawler->filter('.episode_list')->each(function (Crawler $parentCrawler, $i) {
        $data['link']            = $parentCrawler->filter('a')->attr('href');
        $data['title']           = $parentCrawler->filter('a')->attr('title');
        return $data;
        });
        $data['image']           = $crawler->filter('.cat_image > img')->attr('data-src');
        return $data;

    }


   

}