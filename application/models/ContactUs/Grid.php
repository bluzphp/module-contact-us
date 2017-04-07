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
    const DEFAULT_LIMIT = 25;

    /**
     * @var string
     */
    protected $uid = 'contact_us';

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
        $this->setAllowOrders(['id', 'name', 'email', 'readed', 'answered', 'created', 'updated']);
        $this->setAllowFilters(['name', 'email', 'readed', 'answered']);
        return $this;
    }
}
