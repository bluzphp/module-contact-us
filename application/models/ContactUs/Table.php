<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

declare(strict_types=1);

namespace Application\ContactUs;

/**
 * Contact us Table
 *
 * @package  Application\ContactUs
 *
 * @method   static Row findRow($primaryKey)
 * @method   static Row findRowWhere($whereList)
 */
class Table extends \Bluz\Db\Table
{
    /**
     * Table
     *
     * @var string
     */
    protected $name = 'contact_us';

    /**
     * Primary key(s)
     * @var array
     */
    protected $primary = ['id'];
}
