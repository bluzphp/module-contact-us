<?php
/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types = 1);

namespace Application;

use Application\ContactUs\Row;
use Bluz\Db\Exception\DbException;
use Bluz\Proxy\Request;
use Bluz\Proxy\Messages;
use Bluz\Controller\Controller;
use Bluz\Proxy\Layout;
use Bluz\Proxy\Config;
use Bluz\Proxy\Response;
use Bluz\Validator\Exception\ValidatorException;
use ReCaptcha\ReCaptcha;

/**
 * @param string $name
 * @param string $email
 * @param string $subject
 * @param string $message
 *
 * @return array
 * @throws ValidatorException
 */
return function ($name, $email, $subject, $message) {
    /**
     * @var Controller $this
     */
    Layout::breadCrumbs(
        [
            __('Contact us')
        ]
    );

    $user = $this->user();

    $this->assign('user', $user);
    $this->assign('name', $name);
    $this->assign('email', $email);
    $this->assign('subject', $subject);
    $this->assign('message', $message);

    $this->assign('siteKey', Config::getModuleData('contact-us', 'siteKey'));

    if (Request::isPost()) {
        $row = new Row();

        if (!$user) {
            $reCaptcha = new ReCaptcha(Config::getModuleData('contact-us', 'secretKey'));
            $response = $reCaptcha->verify(Request::getParam('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);

            if (!$response->isSuccess()) {
                $exception = new ValidatorException();
                $exception->setError('captcha', 'Invalid captcha');
            }
        }

        $row->name = $user ? $user->login : $name;
        $row->email = $user ? $user->email : $email;

        $row->subject = $subject;
        $row->message = $message;

        try {
            $row->save();
            Messages::addSuccess('Message was successfully save');
            Response::reload();
        } catch (ValidatorException $e) {
            Messages::addError('Please fix all errors');
            return [
                'name' => $row->name,
                'email' => $row->email,
                'subject' => $row->subject,
                'message' => $row->message,
                'errors' => $e->getErrors()
            ];
        } catch (DbException $e) {
            Messages::addError('Please contact administrator');
        }
    }
};
