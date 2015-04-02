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
}