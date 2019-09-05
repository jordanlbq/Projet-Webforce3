<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190905130912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE definition (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, terme VARCHAR(255) NOT NULL, date_upload DATE NOT NULL, photo VARCHAR(255) DEFAULT NULL, videoUrl VARCHAR(255) DEFAULT NULL, videoUpload VARCHAR(255) DEFAULT NULL, etat INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(50) NOT NULL, prenom VARCHAR(30) NOT NULL, nom VARCHAR(30) NOT NULL, civilite VARCHAR(1) NOT NULL, ville VARCHAR(50) NOT NULL, code_postal INT NOT NULL, adresse LONGTEXT NOT NULL, telephone VARCHAR(17) NOT NULL, date_de_naissance DATE NOT NULL, role VARCHAR(20) NOT NULL, salt VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE definition');
        $this->addSql('DROP TABLE user');
    }
}
