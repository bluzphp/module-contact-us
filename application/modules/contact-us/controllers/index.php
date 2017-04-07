<?php
/**
 * Add message page
 */

/**
 * @namespace
 */
namespace Application;

use Application\ContactUs\Row;
use Bluz\Proxy\Request;
use Bluz\Proxy\Messages;
use Bluz\Controller\Controller;
use Bluz\Proxy\Layout;
use Bluz\Proxy\Config;
use ReCaptcha\ReCaptcha;

/**
 * @param string $name
 * @param string $email
 * @param string $subject
 * @param string $message
 * @return \closure
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

    if (Request::isPost()) {
        $row = new Row();

        if (!$user) {
            $reCaptcha = new ReCaptcha(Config::getModuleData('contact-us', 'secretKey'));
            $response = $reCaptcha->verify(Request::getParam('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);

            if (!$response->isSuccess()) {
                Messages::addError('Invalid captcha');
                return;
            }
        }

        $row->name = $user ? $user->login : $name;
        $row->email = $user ? $user->email : $email;

        $row->subject = $subject;
        $row->message = $message;
        $result = $row->save();

        if ($result) {
            Messages::addSuccess('Message was successfully save');
        } else {
            Messages::addError('Invalid form data');
        }
    } else {
        $siteKey = Config::getModuleData('contact-us', 'siteKey');

        $this->assign('user', $user);
        $this->assign('siteKey', $siteKey);
    }
};
