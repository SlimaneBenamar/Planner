<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422123014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe ADD COLUMN code_groupe VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__groupe AS SELECT id, nbr_etudiant FROM groupe');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('CREATE TABLE groupe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nbr_etudiant INTEGER NOT NULL)');
        $this->addSql('INSERT INTO groupe (id, nbr_etudiant) SELECT id, nbr_etudiant FROM __temp__groupe');
        $this->addSql('DROP TABLE __temp__groupe');
    }
}
