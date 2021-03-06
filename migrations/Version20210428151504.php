<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428151504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS enseignant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_enseignant VARCHAR(50) NOT NULL, prenom_enseignant VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE IF NOT EXISTS formation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lib_formation VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE IF NOT EXISTS groupe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation_id INTEGER NOT NULL, nbr_etudiant INTEGER NOT NULL, code_groupe VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_4B98C215200282E ON groupe (formation_id)');
        $this->addSql('CREATE TABLE IF NOT EXISTS module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation_id INTEGER NOT NULL, lib_module VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_C2426285200282E ON module (formation_id)');
        $this->addSql('CREATE TABLE IF NOT EXISTS salle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, code_salle VARCHAR(50) NOT NULL, capacite_salle INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE IF NOT EXISTS seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_enseignant_id INTEGER NOT NULL, id_formation_id INTEGER NOT NULL, id_module_id INTEGER NOT NULL, groupe_id INTEGER NOT NULL, id_salle_id INTEGER NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, type VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_DF7DFD0E5A7D2DA5 ON seance (id_enseignant_id)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_DF7DFD0E71C15D5C ON seance (id_formation_id)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_DF7DFD0E2FF709B6 ON seance (id_module_id)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_DF7DFD0E7A45358C ON seance (groupe_id)');
        $this->addSql('CREATE INDEX IF NOT EXISTS IDX_DF7DFD0E8CEBACA0 ON seance (id_salle_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
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
        $this->addSql('DROP TABLE user');
    }
}
