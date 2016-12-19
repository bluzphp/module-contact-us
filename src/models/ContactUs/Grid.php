<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

/**
 * @namespace
 */
namespace Application\ContactUs;

use Bluz\Grid\Source\SqlSource;

/**
 * Grid based on SQL
 *
 * @category Application
 * @package  ContactUs
 */
class Grid extends \Bluz\Grid\Grid
{
    /**
     * @var string
     */
    protected $uid = 'contact_us';

    const DEFAULT_LIMIT = 25;

    /**
     * init
     *
     * @return self
     */
    public function init()
    {
        $adapter = new SqlSource();
        $adapter->setSource('SELECT * FROM contact_us');

        $this->setAdapter($adapter);
        $this->setDefaultLimit(self::DEFAULT_LIMIT);
        $this->setAllowOrders(['id', 'name', 'email', 'mark_read', 'mark_answered', 'created', 'updated']);
        $this->setAllowFilters(['name', 'email', 'mark_read', 'mark_answered']);
        return $this;
    }
}
