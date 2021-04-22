<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422134853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__seance AS SELECT id, date_debut, date_fin, type FROM seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_enseignant_id INTEGER NOT NULL, id_formation_id INTEGER NOT NULL, id_module_id INTEGER NOT NULL, id_salle_id INTEGER NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, type VARCHAR(50) NOT NULL COLLATE BINARY, CONSTRAINT FK_DF7DFD0E5A7D2DA5 FOREIGN KEY (id_enseignant_id) REFERENCES enseignant (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E71C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E2FF709B6 FOREIGN KEY (id_module_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DF7DFD0E8CEBACA0 FOREIGN KEY (id_salle_id) REFERENCES salle (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO seance (id, date_debut, date_fin, type) SELECT id, date_debut, date_fin, type FROM __temp__seance');
        $this->addSql('DROP TABLE __temp__seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E5A7D2DA5 ON seance (id_enseignant_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E71C15D5C ON seance (id_formation_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E2FF709B6 ON seance (id_module_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DF7DFD0E8CEBACA0 ON seance (id_salle_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_DF7DFD0E5A7D2DA5');
        $this->addSql('DROP INDEX IDX_DF7DFD0E71C15D5C');
        $this->addSql('DROP INDEX IDX_DF7DFD0E2FF709B6');
        $this->addSql('DROP INDEX UNIQ_DF7DFD0E8CEBACA0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__seance AS SELECT id, date_debut, date_fin, type FROM seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, type VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO seance (id, date_debut, date_fin, type) SELECT id, date_debut, date_fin, type FROM __temp__seance');
        $this->addSql('DROP TABLE __temp__seance');
    }
}
