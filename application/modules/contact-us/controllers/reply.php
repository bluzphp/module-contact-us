<?php

/**
 * @copyright Bluz PHP Team
 * @link      https://github.com/bluzphp/skeleton
 */

declare(strict_types=1);

namespace Application;

use Bluz\Controller\Controller;
use Bluz\Http\Exception\NotFoundException;
use Bluz\Proxy\Messages;
use Bluz\Proxy\Request;
use Bluz\Proxy\Mailer;
use Bluz\Proxy\Response;

/**
 * @param int $id
 * @param string $message
 *
 * @throws NotFoundException
 * @throws \Bluz\Common\Exception\ConfigurationException
 * @throws \Bluz\Db\Exception\DbException
 * @throws \Bluz\Db\Exception\InvalidPrimaryKeyException
 * @throws \Bluz\Db\Exception\TableNotFoundException
 * @throws \Bluz\Http\Exception\RedirectException
 */
return function ($id, $message) {
    /**
     * @var Controller $this
     */
    $row = ContactUs\Table::findRow($id);
    if (!$row) {
        throw new NotFoundException('Row not found');
    }

    if (Request::isPost()) {
        $mail = Mailer::create();
        $mail->Subject = 'Reply';
        $mail->MsgHTML($message);
        $mail->AddAddress($row['email']);

        if (Mailer::send($mail)) {
            $row->markAnswered = 1;
            $row->save();
            Messages::addSuccess('Message was successfully sent to ' . $row['email']);
            Response::redirectTo('contact-us', 'grid');
        }
    } else {
        if (!$row->markRead) {
            $row->markRead = 1;
            $row->save();
        }
        $this->assign('row', $row);
    }
};
