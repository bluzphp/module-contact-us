<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

/**
 * @namespace
 */
namespace Application\ContactUs;

use Bluz\Validator\Traits\Validator;
use Bluz\Validator\Validator as v;

/**
 * Options Row
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property boolean $mark_read
 * @property boolean $mark_answered
 * @property string $created
 * @property string $updated
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
    protected function beforeSave()
    {
        $this->addValidator(
            'name',
            v::required()->setError('Value is required')
        );
        $this->addValidator(
            'email',
            v::required()->setError('Value is required'),
            v::email()->setError('Please fill correct email address')
        );
        $this->addValidator(
            'message',
            v::required()->setError('Value is required')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function beforeInsert()
    {
        $this->created = gmdate('Y-m-d H:i:s');
    }

    /**
     * {@inheritdoc}
     */
    protected function beforeUpdate()
    {
        $this->updated = gmdate('Y-m-d H:i:s');
    }
}
