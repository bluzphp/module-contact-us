<?php
/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types = 1);

namespace Application;

use Bluz\Application\Exception\NotFoundException;
use Bluz\Controller\Controller;
use Bluz\Proxy\Request;

/**
 * @param int $id
 *
 * @throws NotFoundException
 */
return function($id) {
    /**
     * @var Controller $this
     */
    $row = ContactUs\Table::findRow($id);
    if (empty($row)) {
        throw new NotFoundException('Row not found');
    }

    if (Request::isPost()) {
        $row->markRead = !$row->markRead;
        $row->save();
    }

    $this->assign('row', $row);
};
