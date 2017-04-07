<?php
/**
 * Grid of contact us messages
 * @return closure
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Proxy\Layout;
use Bluz\Controller\Controller;

/**
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
