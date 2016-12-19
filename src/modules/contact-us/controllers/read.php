<?php
/**
 * Read page
 */

/**
 * @namespace
 */
namespace Application;

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
            throw new Exception('Row not found', 404);
        }

        if (Request::isPost()) {
            $row->mark_read ? $row->mark_read = 0 : $row->mark_read = 1;
            $row->save();
        }

        $this->assign('row', $row);
    };
