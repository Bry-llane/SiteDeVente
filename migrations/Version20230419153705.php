<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419153705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE i23_paniers ADD COLUMN quantite_panier INTEGER NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__i23_paniers AS SELECT id FROM i23_paniers');
        $this->addSql('DROP TABLE i23_paniers');
        $this->addSql('CREATE TABLE i23_paniers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO i23_paniers (id) SELECT id FROM __temp__i23_paniers');
        $this->addSql('DROP TABLE __temp__i23_paniers');
    }
}
