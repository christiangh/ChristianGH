<?php

namespace Christiangh\MainCghWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndexPage
 *
 * @ORM\Table(name="index_page")
 * @ORM\Entity(repositoryClass="Christiangh\MainCghWebsiteBundle\Repository\IndexPageRepository")
 */
class IndexPage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url_es", type="string", length=255)
     */
    private $urlEs;

    /**
     * @var string
     *
     * @ORM\Column(name="url_en", type="string", length=255)
     */
    private $urlEn;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return IndexPage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set urlEs
     *
     * @param string $urlEs
     * @return IndexPage
     */
    public function setUrlEs($urlEs)
    {
        $this->urlEs = $urlEs;

        return $this;
    }

    /**
     * Get urlEs
     *
     * @return string 
     */
    public function getUrlEs()
    {
        return $this->urlEs;
    }

    /**
     * Set urlEn
     *
     * @param string $urlEn
     * @return IndexPage
     */
    public function setUrlEn($urlEn)
    {
        $this->urlEn = $urlEn;

        return $this;
    }

    /**
     * Get urlEn
     *
     * @return string 
     */
    public function getUrlEn()
    {
        return $this->urlEn;
    }
    
    /** FUNCTIONS **/
    public function getUrl($locale){
        $locale = strtolower($locale);
        
        switch($locale){
            case "es": return $this->getUrlEs();
                break;
            
            case "en": return $this->getUrlEn();
                break;
        }
        
        return "";
    }
    /** FUNCTIONS **/
}
