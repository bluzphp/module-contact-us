<?php

/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

declare(strict_types=1);

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
    public const DEFAULT_LIMIT = 25;

    /**
     * @var string
     */
    protected $uid = 'contact_us';

    /**
     * {@inheritdoc}
     * @throws \Bluz\Grid\GridException
     */
    public function init(): void
    {
        $adapter = new SqlSource();
        $adapter->setSource('SELECT * FROM contact_us');

        $this->setAdapter($adapter);
        $this->setDefaultLimit(self::DEFAULT_LIMIT);
        $this->setAllowOrders(['id', 'name', 'email', 'subject', 'markRead', 'markAnswered', 'created', 'updated']);
        $this->setAllowFilters(['name', 'email', 'subject', 'message', 'markRead', 'markAnswered']);
        $this->addAlias('markAnswered', 'answered');
        $this->addAlias('markRead', 'readed');
    }
}
