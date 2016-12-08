<?php
/**
 * Reply page
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Proxy\Messages;
use Bluz\Proxy\Request;
use Bluz\Proxy\Mailer;
use Bluz\Controller\Controller;
use Bluz\Proxy\Response;

return
    /**
     * @param int $id
     * @param string $message
     */
    function ($id, $message) {
        /**
         * @var Controller $this
         */
        $row = ContactUs\Table::findRow(['id' => $id]);
        if (empty($row)) {
            throw new Exception('Row not found', 404);
        }

        if (Request::isPost()) {
            $mail = Mailer::create();
            $mail->Subject = 'Reply';
            $mail->MsgHTML($message);
            $mail->AddAddress($row['email']);
            if (Mailer::send($mail)) {
                $row->mark_answered = 1;
                $row->save();
                Messages::addSuccess('Message was successfully sent to ' . $row['email']);
                Response::redirectTo('contact-us', 'grid');
            }
        } else {
            if ($row->mark_read == 0) {
                $row->mark_read = 1;
                $row->save();
            }
            $this->assign('row', $row);
        }
    };
