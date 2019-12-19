<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190810120930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, message VARCHAR(255) DEFAULT NULL, status VARCHAR(10) DEFAULT NULL, subject VARCHAR(100) DEFAULT NULL, comment VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product CHANGE detail detail VARCHAR(200) DEFAULT NULL');
        $this->addSql('ALTER TABLE settings CHANGE aboutus aboutus VARCHAR(200) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE message');
        $this->addSql('ALTER TABLE product CHANGE detail detail LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE settings CHANGE aboutus aboutus LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
