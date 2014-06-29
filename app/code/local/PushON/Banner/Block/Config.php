<?php


class PushON_Banner_Block_Config extends Mage_Core_Block_Template{
    
    private $title;
    private $description;
    
    public function __construct(array $args = array()) {
        parent::__construct($args);
        $this->init();
    }
    
    private function init(){
        
        //if home page
         if(Mage::getSingleton('cms/page')->getIdentifier() == 'home'  && Mage::app()->getFrontController()->getRequest()->getRouteName() == 'cms'){
             $this->homeBanner();
         }
         
         //if category page
         if(Mage::registry('current_category')){
             $this->categoryBanner();
         }
         
         //if category page
         if(Mage::registry('current_product')){
             $this->productBanner();
         }
         
    }
    
    
    private function homeBanner(){
        $this->title = "Home Banner";
        $this->description = "Whatever we want the home description to be";
    }
    
    private function categoryBanner(){
        $this->title = Mage::registry('current_category')->getName();
        $this->description = Mage::registry('current_category')->getDescription();
    }
    
    private function productBanner(){
        $this->title = Mage::registry('current_product')->getName();
        $this->description = Mage::registry('current_product')->getDescription();
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getDescription(){
        return $this->description;
    }
}
