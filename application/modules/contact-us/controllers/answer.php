<?php
/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types = 1);

namespace Application;

use Bluz\Controller\Controller;
use Bluz\Http\Exception\NotFoundException;

/**
 * @param int $id
 *
 * @throws NotFoundException
 * @throws \Bluz\Common\Exception\ConfigurationException
 * @throws \Bluz\Db\Exception\DbException
 * @throws \Bluz\Db\Exception\InvalidPrimaryKeyException
 * @throws \Bluz\Db\Exception\TableNotFoundException
 */
return function ($id) {
    /**
     * @var Controller $this
     */
    $row = ContactUs\Table::findRow($id);

    if (!$row) {
        throw new NotFoundException('Row not found');
    }

    $row->markAnswered = !$row->markAnswered;

    $row->save();
};
