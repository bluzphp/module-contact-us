<?php
/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types = 1);

namespace Application;

use Bluz\Controller\Controller;
use Bluz\Controller\Mapper\Crud;

/**
 * @accept    HTML
 * @accept    JSON
 * @privilege Management
 *
 * @return mixed
 * @throws \Bluz\Common\Exception\CommonException
 * @throws \Bluz\Common\Exception\ComponentException
 * @throws \Bluz\Controller\ControllerException
 * @throws \Bluz\Http\Exception\ForbiddenException
 * @throws \Bluz\Http\Exception\NotAcceptableException
 * @throws \Bluz\Http\Exception\NotAllowedException
 * @throws \Bluz\Http\Exception\NotImplementedException
 */
return function () {
    /**
     * @var Controller $this
     */
    $crud = new Crud(ContactUs\Crud::getInstance());

    $crud->get('system', 'crud/get');
    $crud->post('system', 'crud/post');
    $crud->put('system', 'crud/put');
    $crud->delete('system', 'crud/delete');

    return $crud->run();
};
