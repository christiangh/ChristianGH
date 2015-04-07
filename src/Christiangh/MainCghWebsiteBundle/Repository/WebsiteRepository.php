<?php

namespace Christiangh\MainCghWebsiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class WebsiteRepository extends EntityRepository
{
    public function findAll(){
        //Open connection
        $em = $this->getEntityManager();
        
        $query = $em->createQueryBuilder()
                      ->select('website')
                      ->from('ChristianghMainCghWebsiteBundle:Website', 'website')
                      ->addOrderBy('website.id', 'ASC')
                ;
        
        return $query->getQuery()->getResult();
    }
}
