<?php

/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

declare(strict_types=1);

namespace Application\ContactUs;

use Bluz\Validator\Traits\Validator;
use Bluz\Proxy\Auth;

/**
 * Options Row
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property boolean $markRead
 * @property boolean $markAnswered
 * @property string $created
 * @property string $updated
 * @property string $userId
 *
 * @category Application
 * @package  ContactUs
 */
class Row extends \Bluz\Db\Row
{
    use Validator;

    /**
     * {@inheritdoc}
     */
    protected function beforeSave(): void
    {
        if (!Auth::getIdentity()) {
            $this->addValidator('name')
                ->required()
                ->alpha(' \'');
            $this->addValidator('email')
                ->required()
                ->email();
        }

        $this->addValidator('subject')
            ->required()
            ->alpha(' \'');

        $this->addValidator('message')
            ->required();
    }

    /**
     * {@inheritdoc}
     */
    public function beforeInsert(): void
    {
        $this->created = gmdate('Y-m-d H:i:s');

        /* @var \Application\Users\Row $user */
        if ($user = Auth::getIdentity()) {
            $this->userId = $user->getId();
        } else {
            $this->userId = \Application\Users\Table::SYSTEM_USER;
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function beforeUpdate(): void
    {
        $this->updated = gmdate('Y-m-d H:i:s');
    }
}
