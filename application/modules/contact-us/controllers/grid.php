<?php
/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types = 1);

namespace Application;

use Bluz\Proxy\Layout;
use Bluz\Controller\Controller;

/**
 * @privilege Management
 *
 * @return void
 */
return function () {
    /**
     * @var Controller $this
     */
    Layout::setTemplate('dashboard.phtml');
    Layout::breadCrumbs(
        [
            Layout::ahref('Dashboard', ['dashboard', 'index']),
            __('Contact Us')
        ]
    );

    $grid = new ContactUs\Grid();
    $grid->setModule($this->module);
    $grid->setController($this->controller);

    $this->assign('grid', $grid);
};
