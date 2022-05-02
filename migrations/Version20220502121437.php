<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502121437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE athlete (id INT AUTO_INCREMENT NOT NULL, gender_id INT DEFAULT NULL, country_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, INDEX IDX_C03B8321708A0E0 (gender_id), INDEX IDX_C03B8321F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, style_id INT NOT NULL, gender_id INT NOT NULL, name VARCHAR(255) NOT NULL, step_distance DOUBLE PRECISION NOT NULL, step_number INT NOT NULL, shot_number INT NOT NULL, INDEX IDX_B50A2CB1BACD6074 (style_id), INDEX IDX_B50A2CB1708A0E0 (gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE config (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, flag VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE run (id INT AUTO_INCREMENT NOT NULL, stage_id INT DEFAULT NULL, athlete_id INT DEFAULT NULL, competition_id INT DEFAULT NULL, shot_id INT DEFAULT NULL, zone_id INT DEFAULT NULL, date_run DATE DEFAULT NULL, step_run INT DEFAULT NULL, result_run INT DEFAULT NULL, hour_run VARCHAR(255) DEFAULT NULL, INDEX IDX_5076A4C02298D193 (stage_id), INDEX IDX_5076A4C0FE6BCB8B (athlete_id), INDEX IDX_5076A4C07B39D312 (competition_id), INDEX IDX_5076A4C0C274538A (shot_id), INDEX IDX_5076A4C09F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shot (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C27C9369F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone_stage (zone_id INT NOT NULL, stage_id INT NOT NULL, INDEX IDX_64523CCF9F2C3FAB (zone_id), INDEX IDX_64523CCF2298D193 (stage_id), PRIMARY KEY(zone_id, stage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B8321708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B8321F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1BACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE run ADD CONSTRAINT FK_5076A4C02298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE run ADD CONSTRAINT FK_5076A4C0FE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athlete (id)');
        $this->addSql('ALTER TABLE run ADD CONSTRAINT FK_5076A4C07B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE run ADD CONSTRAINT FK_5076A4C0C274538A FOREIGN KEY (shot_id) REFERENCES shot (id)');
        $this->addSql('ALTER TABLE run ADD CONSTRAINT FK_5076A4C09F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE zone_stage ADD CONSTRAINT FK_64523CCF9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_stage ADD CONSTRAINT FK_64523CCF2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE run DROP FOREIGN KEY FK_5076A4C0FE6BCB8B');
        $this->addSql('ALTER TABLE run DROP FOREIGN KEY FK_5076A4C07B39D312');
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B8321F92F3E70');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369F92F3E70');
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B8321708A0E0');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1708A0E0');
        $this->addSql('ALTER TABLE run DROP FOREIGN KEY FK_5076A4C0C274538A');
        $this->addSql('ALTER TABLE run DROP FOREIGN KEY FK_5076A4C02298D193');
        $this->addSql('ALTER TABLE zone_stage DROP FOREIGN KEY FK_64523CCF2298D193');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1BACD6074');
        $this->addSql('ALTER TABLE run DROP FOREIGN KEY FK_5076A4C09F2C3FAB');
        $this->addSql('ALTER TABLE zone_stage DROP FOREIGN KEY FK_64523CCF9F2C3FAB');
        $this->addSql('DROP TABLE athlete');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE config');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE run');
        $this->addSql('DROP TABLE shot');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE zone_stage');
    }
}
