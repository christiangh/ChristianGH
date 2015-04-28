<?php

namespace Christiangh\MainCghWebsiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class IndexPageRepository extends EntityRepository
{
    public function findAll(){
        //Open connection
        $em = $this->getEntityManager();
        
        $query = $em->createQueryBuilder()
                      ->select('content')
                      ->from('ChristianghMainCghWebsiteBundle:IndexPage', 'content')
                      ->addOrderBy('content.id', 'ASC')
                ;
        
        return $query->getQuery()->getResult();
    }
    
    public function getAllUrls($domain, $locale){
        //Open connection
        $em = $this->getEntityManager();
        
        $urls = array();
        
        $query = $em->createQueryBuilder()
                      ->select('index_page')
                      ->from('ChristianghMainCghWebsiteBundle:IndexPage', 'index_page')
                      ->addOrderBy('index_page.id', 'ASC')
                ;
        
        $index_pages = $query->getQuery()->getResult();
        
        foreach($index_pages as $index_page){
            $url = $index_page->getUrl($locale);
            if( !empty($url) ){
                $urls[] = $url;
            }
        }
        
        return $urls;
    }
}
