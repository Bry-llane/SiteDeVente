<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230418210718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE i23_paniers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE i23_produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, panier_id INTEGER DEFAULT NULL, libelle VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, quantite INTEGER DEFAULT NULL, CONSTRAINT FK_4B08D552F77D927C FOREIGN KEY (panier_id) REFERENCES i23_paniers (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_4B08D552F77D927C ON i23_produits (panier_id)');
        $this->addSql('CREATE TABLE i23_users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, panier_id INTEGER DEFAULT NULL, login VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(100) NOT NULL, birthday DATETIME NOT NULL, CONSTRAINT FK_67D32048F77D927C FOREIGN KEY (panier_id) REFERENCES i23_paniers (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67D32048AA08CB10 ON i23_users (login)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67D32048F77D927C ON i23_users (panier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE i23_paniers');
        $this->addSql('DROP TABLE i23_produits');
        $this->addSql('DROP TABLE i23_users');
    }
}
