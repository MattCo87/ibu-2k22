<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008194140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, style_id INT NOT NULL, distance_id INT NOT NULL, gender_id INT NOT NULL, INDEX IDX_B50A2CB1BACD6074 (style_id), INDEX IDX_B50A2CB113192463 (distance_id), INDEX IDX_B50A2CB1708A0E0 (gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, flag VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE distance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C27C9369F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_competition (id INT AUTO_INCREMENT NOT NULL, stage_id INT NOT NULL, competition_id INT NOT NULL, date_run DATE NOT NULL, INDEX IDX_64FD115B2298D193 (stage_id), INDEX IDX_64FD115B7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1BACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB113192463 FOREIGN KEY (distance_id) REFERENCES distance (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE stage_competition ADD CONSTRAINT FK_64FD115B2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE stage_competition ADD CONSTRAINT FK_64FD115B7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_competition DROP FOREIGN KEY FK_64FD115B7B39D312');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369F92F3E70');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB113192463');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1708A0E0');
        $this->addSql('ALTER TABLE stage_competition DROP FOREIGN KEY FK_64FD115B2298D193');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1BACD6074');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE distance');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE stage_competition');
        $this->addSql('DROP TABLE style');
    }
}
