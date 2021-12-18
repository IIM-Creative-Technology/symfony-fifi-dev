<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218133908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) NOT NULL, CHANGE intelligence intelligence VARCHAR(255) DEFAULT NULL, CHANGE strength strength VARCHAR(255) DEFAULT NULL, CHANGE speed speed VARCHAR(255) DEFAULT NULL, CHANGE durability durability VARCHAR(255) DEFAULT NULL, CHANGE power power VARCHAR(255) DEFAULT NULL, CHANGE combat combat VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE intelligence intelligence INT DEFAULT NULL, CHANGE strength strength INT DEFAULT NULL, CHANGE speed speed INT DEFAULT NULL, CHANGE durability durability INT DEFAULT NULL, CHANGE power power INT DEFAULT NULL, CHANGE combat combat INT DEFAULT NULL');
    }
}
