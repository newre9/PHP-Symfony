<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190808143738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE settings (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(25) DEFAULT NULL, description VARCHAR(25) DEFAULT NULL, keywords VARCHAR(25) DEFAULT NULL, company VARCHAR(36) DEFAULT NULL, address VARCHAR(200) DEFAULT NULL, fax INT DEFAULT NULL, telefon INT DEFAULT NULL, email VARCHAR(63) DEFAULT NULL, smtpserver VARCHAR(85) DEFAULT NULL, smtpmail VARCHAR(200) DEFAULT NULL, smtppasw VARCHAR(200) DEFAULT NULL, smtpport VARCHAR(200) DEFAULT NULL, aboutus VARCHAR(200) DEFAULT NULL, contact VARCHAR(200) DEFAULT NULL, referans VARCHAR(200) DEFAULT NULL, status VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE settings');
    }
}
