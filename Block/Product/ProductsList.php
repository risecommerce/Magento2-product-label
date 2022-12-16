<?php
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

namespace Risecommerce\ProductLabel\Block\Product;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\CatalogWidget\Model\Rule;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Url\EncoderInterface;
use Magento\Framework\View\LayoutFactory;
use Magento\Rule\Model\Condition\Sql\Builder as SqlBuilder;
use Magento\Widget\Helper\Conditions;

class ProductsList extends \Magento\CatalogWidget\Block\Product\ProductsList
{
    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,
        Visibility $catalogProductVisibility,
        HttpContext $httpContext,
        SqlBuilder $sqlBuilder,
        Rule $rule,
        Conditions $conditionsHelper,
        \Risecommerce\ProductLabel\Helper\ProductLabelHelper $productLabelHelper,
        \Magento\Framework\Data\Helper\PostHelper $postDataHelper ,
        \Magento\Wishlist\Helper\Data $wishlistHelper, 
        \Magento\Catalog\Helper\Product\Compare $compareHelper ,
        array $data = [],
        Json $json = null,
        LayoutFactory $layoutFactory = null,
        EncoderInterface $urlEncoder = null,
        CategoryRepositoryInterface $categoryRepository = null        
    ) {
        $this->productLabelHelper = $productLabelHelper;
        $this->postDataHelper = $postDataHelper ;    
        $this->wishlistHelper = $wishlistHelper ;    
        $this->compareHelper = $compareHelper ;    
        parent::__construct(
                $context,
                $productCollectionFactory,
                $catalogProductVisibility,
                $httpContext,
                $sqlBuilder,
                $rule,
                $conditionsHelper,
                $data,
                $json,
                $layoutFactory,
                $urlEncoder,
                $categoryRepository
        );
    }

    public function getProductLabelHelper() {
        return $this->productLabelHelper;
    }
    public function getPostDataHelper(){
        return  $this->postDataHelper;
    }
    public function getWishlistHelper(){
        return $this->wishlistHelper;
    }
    public function getCompareHelper(){
        return$this->compareHelper;
    }
}