<?php
/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types=1);

namespace Application;

use Bluz\Application\Exception\NotFoundException;
use Bluz\Controller\Controller;

/**
 * @param int $id
 *
 * @throws NotFoundException
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
