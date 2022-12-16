<?php
/**
 * Risecommerce ProductLabel
 * PHP version 8
 *
 * @category Risecommerce
 * @package   Risecommerce_ProductLabel
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */

namespace Risecommerce\ProductLabel\Model\ResourceModel;

class ProductLabels extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('risecommerce_product_label_rules', 'rule_id');
    }

    /**
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return \Magento\Framework\Model\ResourceModel\Db\AbstractDb
     */
    public function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $this->saveData(
            $object,
            $this->getTable('risecommerce_product_label_rules_store'),
            'rule_id',
            'store_id'
        );
        $this->saveData(
            $object,
            $this->getTable('risecommerce_product_label_rules_customer_group'),
            'rule_id',
            'customer_group_id'
        );
        return parent::_afterSave($object); // TODO: Change the autogenerated stub
    }

    /**
     * @param $object
     * @param $table
     * @param $linkField
     * @param $target
     */
    public function saveData($object, $table, $linkField, $target)
    {
        if (!empty($object->getData($target))) {
            $oldStoreSelect = $this->getConnection()->select()->from($table)->reset(\Magento\Framework\DB\Select::WHERE);
            $oldStoreSelect = $oldStoreSelect->getConnection()
                ->select()
                ->from($table)
                ->reset(\Magento\Framework\DB\Select::COLUMNS)
                ->where($object->getIdFieldName().' = '. $object->getId())
                ->columns($target, $table);
            $oldStores = $this->getConnection()->fetchCol($oldStoreSelect);
            $newStores = $object->getData($target);
            $delete = array_diff($oldStores, $newStores);
            if ($delete) {
                $where = [
                    $linkField . ' = ?' => (int)$object->getData($linkField),
                    $target .' IN (?)' => $delete,
                ];
                $this->getConnection()->delete($table, $where);
            }
            $insert = array_diff($object->getData($target), $oldStores);
            if ($insert) {
                $data = [];
                foreach ($insert as $storeId) {
                    $data[] = [
                        $linkField => (int)$object->getData($linkField),
                        $target => (int)$storeId
                    ];
                }
                $this->getConnection()->insertMultiple($table, $data);
            }
        }
    }
}
