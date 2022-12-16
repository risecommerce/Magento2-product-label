<?php
/**
 * Risecommerce ProductLabel
 * PHP version 8
 *
 * @category Risecommerce
 * @package  Risecommerce_ProductLabel
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */

namespace Risecommerce\ProductLabel\Controller\Adminhtml\Index;

use Risecommerce\ProductLabel\Model\ProductLabels;
use Magento\Backend\App\Action;

class Delete extends Action
{
    /**
     * @var ProductLabels
     */
    protected $model;

    /**
     * Delete constructor.
     * @param Action\Context $context
     * @param ProductLabels $model
     */
    public function __construct(
        Action\Context $context,
        ProductLabels $model
    ) {
        $this->model = $model;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return $this
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                $this->model->load($id);
                $this->model->delete();
                $this->messageManager->addSuccess(__('Product rule has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find product rule to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
