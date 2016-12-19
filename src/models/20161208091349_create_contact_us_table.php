<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

use Phinx\Migration\AbstractMigration;

/**
 * CreateContactUsTable
 */
class CreateContactUsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->execute('CREATE TABLE contact_us ( id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT, userId BIGINT(20) unsigned, name VARCHAR(255), email VARCHAR(255), subject VARCHAR(255), message TEXT NOT NULL, mark_read TINYINT(1) DEFAULT 0, mark_answered TINYINT(1) DEFAULT 0, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, updated TIMESTAMP NOT NULL, CONSTRAINT contact_us_users_id_fk FOREIGN KEY (userId) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE););');
    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('contact_us');
    }
}
