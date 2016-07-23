<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Cria a tabela de usuários
 */
class Version20160723125610 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
            'unsigned' => 1
        ]);
        $table->addColumn('name', 'string', ['length' => 60]);
        $table->addColumn('email', 'string', [
            'length' => 60, 
            'customSchemaOptions' => [
                'unique' => true
            ]
        ]);
        $table->addColumn('password', 'string', ['length' => 60]);
        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('users');
    }
}
