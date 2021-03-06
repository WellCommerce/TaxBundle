<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\TaxBundle\DataSet\Admin;

use Doctrine\ORM\QueryBuilder;
use WellCommerce\Bundle\CoreBundle\DataSet\AbstractDataSet;
use WellCommerce\Component\DataSet\Configurator\DataSetConfiguratorInterface;

/**
 * Class TaxDataSet
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class TaxDataSet extends AbstractDataSet
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(DataSetConfiguratorInterface $configurator)
    {
        $configurator->setColumns([
            'id'    => 'tax.id',
            'name'  => 'tax_translation.name',
            'value' => 'tax.value',
        ]);
    }
    
    protected function createQueryBuilder(): QueryBuilder
    {
        $queryBuilder = $this->repository->getQueryBuilder();
        $queryBuilder->groupBy('tax.id');
        $queryBuilder->leftJoin('tax.translations', 'tax_translation');
        
        return $queryBuilder;
    }
}
