# Risecommerce Magento 2 Product Label Extension

This [Magento 2 Custom Product Label](https://risecommerce.com/store/magento2-custom-product-label.html) extension is used to highlight your products using different custom labels like "New", "Best Seller", "Most Popular", "Sale" etc...

For more details about this extension, visit the [Magento 2 Custom Product Label](https://risecommerce.com/store/magento2-custom-product-label.html).

If you're looking to enhance your Magento store further, consider hiring a [dedicated Magento developer](https://risecommerce.com/hire-dedicated-magento-developer.html).

For support or inquiries, please visit our [contact page](https://risecommerce.com/contact).

## Support: 
version - 2.3.x, 2.4.x

## How to install Extension

Method I)

1. Download the archive file.
2. Unzip the file
3. Create a folder [Magento_Root]/app/code/Risecommerce/ProductLabel
4. Drop/move the unzipped files to directory '[Magento_Root]/app/code/Risecommerce/ProductLabel'

Method II)

Using Composer

composer require risecommerce/magento-2-product-label-extension:1.0.1

### Enable Extension:
- php bin/magento module:enable Risecommerce_ProductLabel
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

### Disable Extension:
- php bin/magento module:disable Risecommerce_ProductLabel
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush
