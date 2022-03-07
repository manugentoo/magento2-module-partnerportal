<?php

namespace Manugentoo\PartnerPortal\Model\ResourceModel\Partners\Grid;

use Manugentoo\PartnerPortal\Model\ResourceModel\Partners\Collection as PartnersCollection;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\Search\AggregationInterface;

/**
 * Class Collection
 * @package Manugentoo\PartnerPortal\Model\ResourceModel\Partners\Grid
 * @author Manu Gentoo <manugentoo@gmail.com>
 */
class Collection extends PartnersCollection implements SearchResultInterface
{

	/**
	 * @var
	 */
	protected $aggregations;

	/**
	 * Collection constructor.
	 * @param \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory
	 * @param \Psr\Log\LoggerInterface $logger
	 * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
	 * @param \Magento\Framework\Event\ManagerInterface $eventManager
	 * @param $mainTable
	 * @param $eventPrefix
	 * @param $eventObject
	 * @param $resourceModel
	 * @param string $model
	 * @param \Magento\Framework\DB\Adapter\AdapterInterface|null $connection
	 * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb|null $resource
	 */
	public function __construct(
		\Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
		\Psr\Log\LoggerInterface $logger,
		\Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
		\Magento\Framework\Event\ManagerInterface $eventManager,
		$mainTable,
		$eventPrefix,
		$eventObject,
		$resourceModel,
		$model = \Magento\Framework\View\Element\UiComponent\DataProvider\Document::class,
		\Magento\Framework\DB\Adapter\AdapterInterface $connection = null,
		\Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
	) {
		parent::__construct(
			$entityFactory,
			$logger,
			$fetchStrategy,
			$eventManager,
			$connection,
			$resource
		);
		$this->_eventPrefix = $eventPrefix;
		$this->_eventObject = $eventObject;
		$this->_init($model, $resourceModel);
		$this->setMainTable($mainTable);
	}

	/**
	 * @return AggregationInterface
	 */
	public function getAggregations()
	{
		return $this->aggregations;
	}

	/**
	 * @param AggregationInterface $aggregations
	 * @return Collection|void
	 */
	public function setAggregations($aggregations)
	{
		$this->aggregations = $aggregations;
	}

	/**
	 * @return null
	 */
	public function getSearchCriteria()
	{
		return null;
	}

	/**
	 * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
	 * @return $this|Collection
	 */
	public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
	{
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTotalCount()
	{
		return $this->getSize();
	}

	/**
	 * @param int $totalCount
	 * @return $this|Collection
	 */
	public function setTotalCount($totalCount)
	{
		return $this;
	}

	/**
	 * @param array|null $items
	 * @return $this|Collection
	 */
	public function setItems(array $items = null)
	{
		return $this;
	}
}