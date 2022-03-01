<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228153704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracter_category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracter_category_liste_animaux (caracter_category_id INT NOT NULL, liste_animaux_id INT NOT NULL, INDEX IDX_AF99FB2F72B818FA (caracter_category_id), INDEX IDX_AF99FB2FBB30713C (liste_animaux_id), PRIMARY KEY(caracter_category_id, liste_animaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_animaux (id INT AUTO_INCREMENT NOT NULL, class_category_id INT NOT NULL, espece VARCHAR(255) NOT NULL, race VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, sex VARCHAR(10) NOT NULL, localisation VARCHAR(255) NOT NULL, age SMALLINT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', photo VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_2B84811C2A2852D4 (class_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracter_category_liste_animaux ADD CONSTRAINT FK_AF99FB2F72B818FA FOREIGN KEY (caracter_category_id) REFERENCES caracter_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caracter_category_liste_animaux ADD CONSTRAINT FK_AF99FB2FBB30713C FOREIGN KEY (liste_animaux_id) REFERENCES liste_animaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_animaux ADD CONSTRAINT FK_2B84811C2A2852D4 FOREIGN KEY (class_category_id) REFERENCES class_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracter_category_liste_animaux DROP FOREIGN KEY FK_AF99FB2F72B818FA');
        $this->addSql('ALTER TABLE liste_animaux DROP FOREIGN KEY FK_2B84811C2A2852D4');
        $this->addSql('ALTER TABLE caracter_category_liste_animaux DROP FOREIGN KEY FK_AF99FB2FBB30713C');
        $this->addSql('DROP TABLE caracter_category');
        $this->addSql('DROP TABLE caracter_category_liste_animaux');
        $this->addSql('DROP TABLE class_category');
        $this->addSql('DROP TABLE liste_animaux');
        $this->addSql('DROP TABLE users');
    }
}
