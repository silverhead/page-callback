<?php

namespace SilverheadPageCallback\entity;

class PageCallback
{
    /**
     * @var string
     */
    private $keyCallingPage = "";

    /**
     * @var string
     */
    protected $callingPageUrl = "";

    /**
     * @var array
     */
    protected $urlParams = array();

    /**
     * @var string
     */
    protected $anchor = "";

    /**
     * @return string
     */
    public function getKeyCallingPage()
    {
        return $this->keyCallingPage;
    }

    /**
     * @param string $keyCallingPage
     * @return PageCallback
     */
    public function setKeyCallingPage($keyCallingPage)
    {
        $this->keyCallingPage = $keyCallingPage;

        return $this;
    }


    /**
     * @return string
     */
    public function getCallingPageUrl()
    {
        return $this->callingPageUrl;
    }

    /**
     * @param string $callingPageUrl
     * @return PageCallback
     */
    public function setCallingPageUrl($callingPageUrl)
    {
        $this->callingPageUrl = $callingPageUrl;

        return $this;
    }

    /**
     * @return array
     */
    public function getUrlParams()
    {
        return $this->urlParams;
    }

    /**
     * @param array $urlParams
     * @return PageCallback
     */
    public function setUrlParams($urlParams)
    {
        $this->urlParams = $urlParams;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * @param string $anchor
     * @return PageCallback
     */
    public function setAnchor($anchor)
    {
        $this->anchor = $anchor;

        return $this;
    }

    public function getFormatedUrl(): string
    {
        $url  =  $this->callingPageUrl;
        $params = [];
        foreach($this->urlParams as $key => $value){
            $params[] = $key."=".$value;
        }
        $url .=  (!empty($this->urlParams)?"?":"");
        $url .= implode("&", $params);
        if(null !== $this->anchor){
            $url .= "#".$this->anchor;
        }

        return $url;
    }
}
