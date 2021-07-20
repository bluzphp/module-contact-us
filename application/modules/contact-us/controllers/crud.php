<?php

/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types=1);

namespace Application;

use Bluz\Common\Exception\CommonException;
use Bluz\Common\Exception\ComponentException;
use Bluz\Controller\Controller;
use Bluz\Controller\ControllerException;
use Bluz\Controller\Mapper\Crud;
use Bluz\Http\Exception\ForbiddenException;
use Bluz\Http\Exception\NotAcceptableException;
use Bluz\Http\Exception\NotAllowedException;
use Bluz\Http\Exception\NotImplementedException;

/**
 * @accept    HTML
 * @accept    JSON
 * @privilege Management
 *
 * @return mixed
 * @throws CommonException
 * @throws ComponentException
 * @throws ControllerException
 * @throws ForbiddenException
 * @throws NotAcceptableException
 * @throws NotAllowedException
 * @throws NotImplementedException
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
