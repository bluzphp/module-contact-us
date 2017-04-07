<?php
/**
 * Read page
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Application\Exception\NotFoundException;
use Bluz\Controller\Controller;
use Bluz\Proxy\Request;

return
    /**
     * @param int $id
     */
    function ($id) {
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
