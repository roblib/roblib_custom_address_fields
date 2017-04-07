<?php
namespace Drupal\roblib_custom_address_fields\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\address\Event\AddressEvents;

class AddressFormatSubscriber implements EventSubscriberInterface {

    static function getSubscribedEvents() {
        $events[AddressEvents::ADDRESS_FORMAT][] = array('onGetDefinition', 0);
        return $events;
    }

    public function onGetDefinition($event) {
        $definition = $event->getDefinition();
        
	// debugging
	//print_r($definition['required_fields']);	
        
	//echo "<pre>";
        //print_r($definition);
        //echo "</pre>";
	    
	// This makes city (locality) field required and leaves
        // the rest address fields as optional
        //$definition['required_fields'] = ['administrativeArea'];
unset($definition['required_fields']);
//unset($definition['postal_code_pattern']);
        //$definition['required_fields'] = NULL;
        
	$event->setDefinition($definition);
    }

}
