<?php

namespace Christiangh\MainCghWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Website
 *
 * @ORM\Table(name="website")
 * @ORM\Entity(repositoryClass="Christiangh\MainCghWebsiteBundle\Repository\WebsiteRepository")
 */
class Website
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
     * @ORM\Column(name="key_name", type="string", length=255)
     */
    private $keyName;

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
     * @ORM\Column(name="site_es", type="string", length=255)
     */
    private $siteEs;

    /**
     * @var string
     *
     * @ORM\Column(name="site_en", type="string", length=255)
     */
    private $siteEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="picture_position", type="string", length=255)
     */
    private $picturePosition;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pin_color", type="string", length=255)
     */
    private $PinColor;


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
     * @return Website
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
     * @return Website
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
     * Set keyName
     *
     * @param string $keyName
     * @return Website
     */
    public function setKeyName($keyName)
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
     * Set urlEs
     *
     * @param string $urlEs
     * @return Website
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
     * @return Website
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
     * Set siteEs
     *
     * @param string $siteEs
     * @return Website
     */
    public function setSiteEs($siteEs)
    {
        $this->siteEs = $siteEs;

        return $this;
    }

    /**
     * Get siteEs
     *
     * @return string 
     */
    public function getSiteEs()
    {
        return $this->siteEs;
    }

    /**
     * Set siteEn
     *
     * @param string $siteEn
     * @return Website
     */
    public function setSiteEn($siteEn)
    {
        $this->siteEn = $siteEn;

        return $this;
    }

    /**
     * Get siteEn
     *
     * @return string 
     */
    public function getSiteEn()
    {
        return $this->siteEn;
    }

    /**
     * Set picturePosition
     *
     * @param string $picturePosition
     * @return Website
     */
    public function setPicturePosition($picturePosition)
    {
        $this->picturePosition = $picturePosition;

        return $this;
    }

    /**
     * Get picturePosition
     *
     * @return string 
     */
    public function getPicturePosition()
    {
        return $this->picturePosition;
    }

    /**
     * Set PinColor
     *
     * @param string $pinColor
     * @return Website
     */
    public function setPinColor($pinColor)
    {
        $this->PinColor = $pinColor;

        return $this;
    }

    /**
     * Get PinColor
     *
     * @return string 
     */
    public function getPinColor()
    {
        return $this->PinColor;
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
    
    public function getSite($locale){
        $locale = strtolower($locale);
        
        switch($locale){
            case "es": return $this->getSiteEs();
                break;
            
            case "en": return $this->getSiteEn();
                break;
        }
        
        return "";
    }
    /** FUNCTIONS **/
}
