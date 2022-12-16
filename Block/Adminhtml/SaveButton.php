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

namespace Risecommerce\ProductLabel\Block\Adminhtml;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;


class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Save Button
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'on_click' => sprintf("location.href = '%s';", $this->getUrl('risecommerce_product_label/index/save')),
            'data_attribute' => [
                'mage-init' => ['button' => ['product_label' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
