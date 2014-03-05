<?php
die('Remove this line to run the script');

// PHP setup
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('memory_limit', '2064M');
ini_set('max_execution_time', 60*60*2);
umask(0);

// Magento Setup
$mageFilename = 'app/Mage.php';
require_once($mageFilename);
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

// Prepare the option 
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

// Loop through all the products
$model = Mage::getModel('catalog/product');
$products = $model->getCollection();
$count = $products->count();
echo sprintf('Updating %d products', $count);
echo "\n<br />";

// Loop through the products
$i = 1;
foreach($products as $product) {
    $optionInstance = $product->getOptionInstance()->unsetOptions();
 
    $product->setHasOptions(1);
    if(isset($option['is_require']) && ($option['is_require'] == 1)) {
        $product->setRequiredOptions(1);
    }
    $optionInstance->addOption($option);
    $optionInstance->setProduct($product);
    $product->save();

    echo sprintf('Updated product %d (%d/%d)', $product->getId(), $i, $count);
    echo "\n<br />";
    $i++;
}

echo sprintf('Updated %d products', $count);
echo "\n<br />";