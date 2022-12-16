<?php
namespace Risecommerce\ProductLabel\Block\Adminhtml;

use Magento\Store\Model\StoreManagerInterface;
/**
 * Risecommerce ProductLabel Module
 * PHP version 8
 *
 * @category Risecommerce
 * @package  Risecommerce_ProductLabel
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */

class ProductUrls extends \Magento\Backend\Block\Template
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $storeManager;

    /**
     * ProductUrls constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @param $path
     * @return mixed
     */
    public function getFileUrl()
    {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $fileUrl = $mediaUrl."risecommerce/product_label_image/";
    }
}
