<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422102503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enseignant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_enseignant VARCHAR(50) NOT NULL, prenom_enseignant VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE formation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lib_formation VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE groupe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nbr_etudiant INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lib_module VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE salle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, code_salle VARCHAR(50) NOT NULL, capacite_salle INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, type VARCHAR(50) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE seance');
    }
}
