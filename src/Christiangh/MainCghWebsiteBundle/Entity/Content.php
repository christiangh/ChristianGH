<?php

namespace Christiangh\MainCghWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity(repositoryClass="Christiangh\MainCghWebsiteBundle\Repository\ContentRepository")
 * 
 */
class Content
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
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;

    /**
     * @ORM\ManyToOne(targetEntity="CategoryContent", inversedBy="contents")
     * 
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="collection_id", type="integer")
     */
    private $collectionId;

    /**
     * @ORM\ManyToOne(targetEntity="CollectionContent", inversedBy="contents")
     * 
     * @ORM\JoinColumn(name="collection_id", referencedColumnName="id")
     */
    protected $collection;

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
     * @var string
     *
     * @ORM\Column(name="key_name", type="string", length=255)
     */
    private $keyName;
    
    /**
     * @var text
     *
     * @ORM\Column(name="tags", type="text")
     */
    private $tags;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_es", type="string", length=255)
     */
    private $descriptionEs;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_en", type="string", length=255)
     */
    private $descriptionEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="keywords_es", type="string", length=255)
     */
    private $keywordsEs;
    
    /**
     * @var string
     *
     * @ORM\Column(name="keywords_en", type="string", length=255)
     */
    private $keywordsEn;


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
     * Set categoryId
     *
     * @param integer $categoryId
     * @return Content
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
    
    /**
     * Set category
     *
     * @param \Christiangh\MainCghWebsiteBundle\Entity\CategoryContent $category
     * @return Content
     */
    public function setCategory(\Christiangh\MainCghWebsiteBundle\Entity\CategoryContent $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Christiangh\MainCghWebsiteBundle\Entity\CategoryContent 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Set collectionId
     *
     * @param integer $collectionId
     * @return Content
     */
    public function setCollectionId($collectionId)
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    /**
     * Get collectionId
     *
     * @return integer 
     */
    public function getCollectionId()
    {
        return $this->collectionId;
    }

    /**
     * Set collection
     *
     * @param \Christiangh\MainCghWebsiteBundle\Entity\CollectionContent $collection
     * @return Content
     */
    public function setCollection(\Christiangh\MainCghWebsiteBundle\Entity\CollectionContent $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \Christiangh\MainCghWebsiteBundle\Entity\CollectionContent 
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set nameEs
     *
     * @param string $nameEs
     * @return Content
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
     * @return Content
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
     * @return Content
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
     * @return Content
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
     * Set keyName
     *
     * @param string $keyName
     * @return Content
     */
    public function setKey($keyName)
    {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * Get keyName
     *
     * @return string 
     */
    public function getKeyName()
    {
        return $this->keyName;
    }
    
    /**
     * Set tags
     *
     * @param string $tags
     * @return Content
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Set descriptionEs
     *
     * @param string $descriptionEs
     * @return Content
     */
    public function setDescriptionEs($descriptionEs)
    {
        $this->descriptionEs = $descriptionEs;

        return $this;
    }

    /**
     * Get descriptionEs
     *
     * @return string 
     */
    public function getDescriptionEs()
    {
        return $this->descriptionEs;
    }

    /**
     * Set descriptionEn
     *
     * @param string $descriptionEn
     * @return Content
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string 
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set keywordsEs
     *
     * @param string $keywordsEs
     * @return Content
     */
    public function setKeywordsEs($keywordsEs)
    {
        $this->keywordsEs = $keywordsEs;

        return $this;
    }

    /**
     * Get keywordsEs
     *
     * @return string 
     */
    public function getKeywordsEs()
    {
        return $this->keywordsEs;
    }

    /**
     * Set keywordsEn
     *
     * @param string $keywordsEn
     * @return Content
     */
    public function setKeywordsEn($keywordsEn)
    {
        $this->keywordsEn = $keywordsEn;

        return $this;
    }

    /**
     * Get keywordsEn
     *
     * @return string 
     */
    public function getKeywordsEn()
    {
        return $this->keywordsEn;
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
    
    public function getFullUrl($locale){
        $locale = strtolower($locale);
        
        switch($locale){
            case "es": return $this->getCategory()->getUrlEs()."-".$this->getCollection()->getUrlEs()."/".$this->getUrlEs();
                break;
            
            case "en": return $this->getCategory()->getUrlEn()."-".$this->getCollection()->getUrlEn()."/".$this->getUrlEn();
                break;
        }
        
        return "";
    }
    
    public function getTagsArray(){
        return explode(";", $this->getTags());
    }
    
    public function getDescription($locale){
        $locale = strtolower($locale);
        
        switch($locale){
            case "es": return $this->getDescriptionEs();
                break;
            
            case "en": return $this->getDescriptionEn();
                break;
        }
        
        return "";
    }
    
    public function getKeywords($locale){
        $locale = strtolower($locale);
        
        switch($locale){
            case "es": return $this->getKeywordsEs();
                break;
            
            case "en": return $this->getKeywordsEn();
                break;
        }
        
        return "";
    }
    /** FUNCTIONS **/    
}
