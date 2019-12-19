<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190728141702 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category CHANGE parentid parentid VARCHAR(25) DEFAULT NULL, CHANGE title title VARCHAR(25) DEFAULT NULL, CHANGE description description VARCHAR(25) DEFAULT NULL, CHANGE keywords keywords VARCHAR(25) DEFAULT NULL, CHANGE cerate cerate VARCHAR(25) DEFAULT NULL, CHANGE updateat updateat VARCHAR(25) DEFAULT NULL, CHANGE status status VARCHAR(25) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category CHANGE parentid parentid VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE title title VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE keywords keywords VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE cerate cerate VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE updateat updateat VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE status status VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
