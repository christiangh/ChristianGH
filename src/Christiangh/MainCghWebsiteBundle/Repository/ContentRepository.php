<?php

namespace Christiangh\MainCghWebsiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ContentRepository extends EntityRepository
{
    public function findAll(){
        //Open connection
        $em = $this->getEntityManager();
        
        $query = $em->createQueryBuilder()
                      ->select('content')
                      ->from('ChristianghMainCghWebsiteBundle:Content', 'content')
                      ->addOrderBy('content.categoryId', 'ASC')
                      ->addOrderBy('content.collectionId', 'ASC')
                      ->addOrderBy('content.id', 'ASC')
                ;
        
        return $query->getQuery()->getResult();
    }
    
    public function findOneByUrl($content_url, $locale){
        //Open connection
        $em = $this->getEntityManager();
        
        $query = $em->createQueryBuilder()
                      ->select('content')
                      ->from('ChristianghMainCghWebsiteBundle:Content', 'content')
                      ->where('content.url'.ucwords($locale).' = :content_url')
                      ->setParameter('content_url', $content_url)
                ;
        
        return $query->getQuery()->getOneOrNullResult();
    }
    
    public function getAllUrls($domain, $locale){
        //Open connection
        $em = $this->getEntityManager();
        
        $urls = array();
        
        $query = $em->createQueryBuilder()
                      ->select('content')
                      ->from('ChristianghMainCghWebsiteBundle:Content', 'content')
                      ->addOrderBy('content.id', 'ASC')
                ;
        
        $contents = $query->getQuery()->getResult();
        
        switch($locale){
            case "es": $content_folder = "contenido";
                break;
            
            case "en": $content_folder = "content";
                break;
        }
        
        foreach($contents as $content){
            $urls[] = $domain."/".$locale."/".$content_folder."/".$content->getFullUrl($locale);
        }
        
        return $urls;
    }
}