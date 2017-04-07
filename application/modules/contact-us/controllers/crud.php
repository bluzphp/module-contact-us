<?php

/**
 * @namespace
 */
namespace Application;

use Application\ContactUs;
use Bluz\Controller\Mapper\Crud;
use Bluz\Controller\Controller;

/**
 * @accept HTML
 * @accept JSON
 * @privilege Management
 *
 * @return mixed
 */
return function () {
    /**
     * @var Controller $this
     */
    $crud = new Crud();
    $crud->setCrud(ContactUs\Crud::getInstance());

    $crud->get('system', 'crud/get');
    $crud->post('system', 'crud/post');
    $crud->put('system', 'crud/put');
    $crud->delete('system', 'crud/delete');

    return $crud->run();
};
