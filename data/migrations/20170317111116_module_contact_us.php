<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

use Phinx\Migration\AbstractMigration;

/**
 * CreateContactUsTable
 */
class ModuleContactUs extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('contact_us');
        $table
            ->addColumn('userId', 'integer')
            ->addColumn('name', 'string', ['length' => 255])
            ->addColumn('email', 'string', ['length' => 255])
            ->addColumn('subject', 'string', ['length' => 255])
            ->addColumn('message', 'text')
            ->addColumn('markRead', 'boolean')
            ->addColumn('markAnswered', 'boolean')
            ->addTimestamps('created', 'updated')
            ->addForeignKey('userId', 'users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->create();

        $data = [
            [
                'roleId' => 2,
                'module' => 'media',
                'privilege' => 'Management'
            ],
            [
                'roleId' => 2,
                'module' => 'media',
                'privilege' => 'Upload'
            ],
            [
                'roleId' => 3,
                'module' => 'media',
                'privilege' => 'Upload'
            ],
        ];

        $privileges = $this->table('acl_privileges');
        $privileges->insert($data)
            ->save();
    }
}
