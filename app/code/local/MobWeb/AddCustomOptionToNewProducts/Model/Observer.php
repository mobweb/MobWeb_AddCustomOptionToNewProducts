<?php

class MobWeb_AddCustomOptionToNewProducts_Model_Observer
{
	public function catalogProductSaveBefore($observer)
	{
		// Load the saved product from the observer
		$event = $observer->getEvent();
		$product = $event->getProduct();

		// If the product isn't a new product, don't
		// do anything
		if(!$product->isObjectNew()) {
			return;
		}

		// Prepare the custom option's details
		$option = array(
		    'title' => 'My Custom Option Title',
		    'type' => 'checkbox',
		    'is_require' => 1,
		    'values' => array(
		    	array(
			    	'title' => 'Yes, please',
			    	'price' => 999,
			    	'price_type' => 'fixed',
		    	)
		    )
		);

		// Assign the custom option to the produt
		$optionInstance = $product->getOptionInstance()->unsetOptions();

		$product->setHasOptions(1);
		if(isset($option['is_require']) && ($option['is_require'] == 1)) {
		    $product->setRequiredOptions(1);
		}
		$optionInstance->addOption($option);
		$optionInstance->setProduct($product);
	}
}