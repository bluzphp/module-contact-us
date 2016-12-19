<?php
/**
 * Answer
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

        if (!$row) {
            throw new Exception('Row not found', 404);
        }

        $row->answered = !$row->answered;

        $row->save();
    };
