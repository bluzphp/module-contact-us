<?php
/**
 * Answer
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Application\Exception\NotFoundException;
use Bluz\Controller\Controller;

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
            throw new NotFoundException('Row not found');
        }

        $row->markAnswered = !$row->markAnswered;

        $row->save();
    };
