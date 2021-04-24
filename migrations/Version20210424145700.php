<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210424145700 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_4B98C215200282E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__groupe AS SELECT id, formation_id, nbr_etudiant, code_groupe FROM groupe');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('CREATE TABLE groupe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation_id INTEGER NOT NULL, nbr_etudiant INTEGER NOT NULL, code_groupe VARCHAR(100) NOT NULL COLLATE BINARY, CONSTRAINT FK_4B98C215200282E FOREIGN KEY (formation_id) REFERENCES formation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO groupe (id, formation_id, nbr_etudiant, code_groupe) SELECT id, formation_id, nbr_etudiant, code_groupe FROM __temp__groupe');
        $this->addSql('DROP TABLE __temp__groupe');
        $this->addSql('CREATE INDEX IDX_4B98C215200282E ON groupe (formation_id)');
        $this->addSql('DROP INDEX IDX_C2426285200282E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__module AS SELECT id, formation_id, lib_module FROM module');
        $this->addSql('DROP TABLE module');
        $this->addSql('CREATE TABLE module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation_id INTEGER NOT NULL, lib_module VARCHAR(100) NOT NULL COLLATE BINARY, CONSTRAINT FK_C2426285200282E FOREIGN KEY (formation_id) REFERENCES formation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO module (id, formation_id, lib_module) SELECT id, formation_id, lib_module FROM __temp__module');
        $this->addSql('DROP TABLE __temp__module');
        $this->addSql('CREATE INDEX IDX_C2426285200282E ON module (formation_id)');
        $this->addSql('DROP INDEX UNIQ_DF7DFD0E8CEBACA0');
        $this->addSql('DROP INDEX IDX_DF7DFD0E2FF709B6');
        $this->addSql('DROP INDEX IDX_DF7DFD0E71C15D5C');
        $this->addSql('DROP INDEX IDX_DF7DFD0E5A7D2DA5');
        $this->addSql('DROP INDEX IDX_DF7DFD0E7A45358C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__seance AS SELECT id, id_enseignant_id, id_formation_id, id_module_id, id_salle_id, groupe_id, date_debut, date_fin, type FROM seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_enseignant_id INTEGER NOT NULL, id_formation_id INTEGER NOT NULL, id_module_id INTEGER NOT NULL, id_salle_id INTEGER NOT NULL, groupe_id INTEGER NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, type VARCHAR(50) NOT NULL COLLATE BINARY, CONSTRAINT FK_DF7DFD0E5A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E71C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E2FF709B6 FOREIGN KEY (id_module_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E8CEBACA0 FOREIGN KEY (id_salle_id) REFERENCES salle (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO seance (id, id_enseignant_id, id_formation_id, id_module_id, id_salle_id, groupe_id, date_debut, date_fin, type) SELECT id, id_enseignant_id, id_formation_id, id_module_id, id_salle_id, groupe_id, date_debut, date_fin, type FROM __temp__seance');
        $this->addSql('DROP TABLE __temp__seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E2FF709B6 ON seance (id_module_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E71C15D5C ON seance (id_formation_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E5A7D2DA5 ON seance (id_enseignant_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E7A45358C ON seance (groupe_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8CEBACA0 ON seance (id_salle_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_4B98C215200282E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__groupe AS SELECT id, formation_id, nbr_etudiant, code_groupe FROM groupe');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('CREATE TABLE groupe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation_id INTEGER NOT NULL, nbr_etudiant INTEGER NOT NULL, code_groupe VARCHAR(100) NOT NULL)');
        $this->addSql('INSERT INTO groupe (id, formation_id, nbr_etudiant, code_groupe) SELECT id, formation_id, nbr_etudiant, code_groupe FROM __temp__groupe');
        $this->addSql('DROP TABLE __temp__groupe');
        $this->addSql('CREATE INDEX IDX_4B98C215200282E ON groupe (formation_id)');
        $this->addSql('DROP INDEX IDX_C2426285200282E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__module AS SELECT id, formation_id, lib_module FROM module');
        $this->addSql('DROP TABLE module');
        $this->addSql('CREATE TABLE module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, formation_id INTEGER NOT NULL, lib_module VARCHAR(100) NOT NULL)');
        $this->addSql('INSERT INTO module (id, formation_id, lib_module) SELECT id, formation_id, lib_module FROM __temp__module');
        $this->addSql('DROP TABLE __temp__module');
        $this->addSql('CREATE INDEX IDX_C2426285200282E ON module (formation_id)');
        $this->addSql('DROP INDEX IDX_DF7DFD0E5A7D2DA5');
        $this->addSql('DROP INDEX IDX_DF7DFD0E71C15D5C');
        $this->addSql('DROP INDEX IDX_DF7DFD0E2FF709B6');
        $this->addSql('DROP INDEX IDX_DF7DFD0E7A45358C');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8CEBACA0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__seance AS SELECT id, id_enseignant_id, id_formation_id, id_module_id, groupe_id, id_salle_id, date_debut, date_fin, type FROM seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_enseignant_id INTEGER NOT NULL, id_formation_id INTEGER NOT NULL, id_module_id INTEGER NOT NULL, groupe_id INTEGER NOT NULL, id_salle_id INTEGER NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, type VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO seance (id, id_enseignant_id, id_formation_id, id_module_id, groupe_id, id_salle_id, date_debut, date_fin, type) SELECT id, id_enseignant_id, id_formation_id, id_module_id, groupe_id, id_salle_id, date_debut, date_fin, type FROM __temp__seance');
        $this->addSql('DROP TABLE __temp__seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E5A7D2DA5 ON seance (id_enseignant_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E71C15D5C ON seance (id_formation_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E2FF709B6 ON seance (id_module_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E7A45358C ON seance (groupe_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DF7DFD0E8CEBACA0 ON seance (id_salle_id)');
    }
}
