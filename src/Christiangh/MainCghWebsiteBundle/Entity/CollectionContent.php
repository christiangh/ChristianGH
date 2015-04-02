<?php

namespace Christiangh\MainCghWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CollectionContent
 *
 * @ORM\Table(name="collection_content")
 * @ORM\Entity
 */
class CollectionContent
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
     * @ORM\Column(name="name_es", type="string", length=255)
     */
    private $nameEs;

    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=255)
     */
    private $nameEn;
    
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
     * @ORM\OneToMany(targetEntity="Content", mappedBy="collection")
     */
    protected $contents;
    
    public function __construct()
    {
        $this->contents = new ArrayCollection();
    }


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
     * Set nameEs
     *
     * @param string $nameEs
     * @return Collection_content
     */
    public function setNameEs($nameEs)
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * Get nameEs
     *
     * @return string 
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     * @return Collection_content
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string 
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }
    
    /**
     * Set urlEs
     *
     * @param string $urlEs
     * @return Category_content
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
     * @return Category_content
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

    /**
     * Add contents
     *
     * @param \Christiangh\MainCghWebsiteBundle\Entity\Content $contents
     * @return CollectionContent
     */
    public function addContent(\Christiangh\MainCghWebsiteBundle\Entity\Content $contents)
    {
        $this->contents[] = $contents;

        return $this;
    }

    /**
     * Remove contents
     *
     * @param \Christiangh\MainCghWebsiteBundle\Entity\Content $contents
     */
    public function removeContent(\Christiangh\MainCghWebsiteBundle\Entity\Content $contents)
    {
        $this->contents->removeElement($contents);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContents()
    {
        return $this->contents;
    }
    
    /** FUNCTIONS **/
    public function getName($locale){
        $locale = strtolower($locale);
        
        switch($locale){
            case "es": return $this->getNameEs();
                break;
            
            case "en": return $this->getNameEn();
                break;
        }
        
        return "";
    }
    
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
