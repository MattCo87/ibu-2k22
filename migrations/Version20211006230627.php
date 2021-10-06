<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211006230627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage_competition (id INT AUTO_INCREMENT NOT NULL, stage_id INT NOT NULL, competition_id INT NOT NULL, date_run DATE NOT NULL, INDEX IDX_64FD115B2298D193 (stage_id), INDEX IDX_64FD115B7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_competition ADD CONSTRAINT FK_64FD115B2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE stage_competition ADD CONSTRAINT FK_64FD115B7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE stage_competition');
    }
}
