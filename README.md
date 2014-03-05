# MobWeb_AddCustomOptionToNewProducts extension for Magento

Upon saving a product for the first time, a custom product option will be added to the product. 

This is useful if you want all of your products to have a certain custom option, but don't want to always add it manually. One use case would be to add a "Gift wrap this product" option to all products.

## Installation

Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/).

## Instructions

The custom option has to be specified right in the code, in the file `Observer.php`.

There is also a script named `add-custom-option-to-existing-product.php`, that you can place in your Magento root to add your custom product option to existing products. Also make sure to update the example custom option before running the script!

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).