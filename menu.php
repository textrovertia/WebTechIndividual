<?php
   class Menu {
    //Contains array of registered items
    protected $menu = array();
    //Contains reserved options
    protected $reserved = array('pid', 'url');
    
	public function add($title, $options)
{
	$url  = $this->getUrl($options);
	$pid  = ( isset($options['pid']) ) ? $options['pid'] : null;
	$attr = ( is_array($options) ) ? $this->extractAttr($options) : array();
	
	$item = new Item($this, $title, $url, $attr, $pid);
	
	array_push($this->menu, $item);
	
	return $item;
}
	
};


?>