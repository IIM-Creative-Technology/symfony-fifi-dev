<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218145719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, intelligence INT DEFAULT NULL, strength INT DEFAULT NULL, speed INT DEFAULT NULL, durability INT DEFAULT NULL, power INT DEFAULT NULL, combat INT DEFAULT NULL, image LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_mission (user_id INT NOT NULL, mission_id INT NOT NULL, INDEX IDX_C86AEC36A76ED395 (user_id), INDEX IDX_C86AEC36BE6CAE90 (mission_id), PRIMARY KEY(user_id, mission_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_mission ADD CONSTRAINT FK_C86AEC36A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_mission ADD CONSTRAINT FK_C86AEC36BE6CAE90 FOREIGN KEY (mission_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_mission DROP FOREIGN KEY FK_C86AEC36A76ED395');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, intelligence INT DEFAULT NULL, strength INT DEFAULT NULL, speed INT DEFAULT NULL, durability INT DEFAULT NULL, power INT DEFAULT NULL, combat INT DEFAULT NULL, image LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE user_mission');
    }
}
