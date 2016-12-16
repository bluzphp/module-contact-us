<?php
/**
 * Add message page
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Proxy\Request;
use Bluz\Proxy\Messages;
use Bluz\Controller\Controller;
use Bluz\Proxy\Session;
use Application\ContactUs\Row;
use Bluz\Proxy\Layout;

/**
 * @param string $name
 * @param string $email
 * @param string $subject
 * @param string $message
 * @param string $captcha
 * @return \closure
 */
return function ($name, $email, $subject, $message, $captcha) {
    /**
     * @var Controller $this
     */
    Layout::breadCrumbs(
        [
            __('Contact us')
        ]
    );

    if (Request::isPost()) {
        $row = new Row();
        $result = '';

        if ($this->user() != null) {
            $row->name = $this->user()->login;
            $row->email = $this->user()->email;
            $row->subject = $subject;
            $row->message = $message;
            $result = $row->save();
        } else {
            if ($captcha == Session::get('captcha')) {
                $row->name = $name;
                $row->email = $email;
                $row->subject = $subject;
                $row->message = $message;
                $result = $row->save();
            } else {
                Messages::addError('Invalid captcha');
            }
        }

        if ($result) {
            Messages::addSuccess('Message was successfully save');
            Session::delete('captcha');
        } else {
            Messages::addError('Invalid form data');
        }
    } else {
        $captcha = rand(1000, 9999);
        Session::set('captcha', $captcha);

        $this->assign('captcha', $captcha);
        $this->assign('user', $this->user());
    }
};
