<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228162711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracter_category_liste_animaux (caracter_category_id INT NOT NULL, liste_animaux_id INT NOT NULL, INDEX IDX_AF99FB2F72B818FA (caracter_category_id), INDEX IDX_AF99FB2FBB30713C (liste_animaux_id), PRIMARY KEY(caracter_category_id, liste_animaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracter_category_liste_animaux ADD CONSTRAINT FK_AF99FB2F72B818FA FOREIGN KEY (caracter_category_id) REFERENCES caracter_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caracter_category_liste_animaux ADD CONSTRAINT FK_AF99FB2FBB30713C FOREIGN KEY (liste_animaux_id) REFERENCES liste_animaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caracter_category DROP FOREIGN KEY FK_487ECF888E962C16');
        $this->addSql('DROP INDEX IDX_487ECF888E962C16 ON caracter_category');
        $this->addSql('ALTER TABLE caracter_category DROP animal_id');
        $this->addSql('ALTER TABLE liste_animaux ADD photo VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE caracter_category_liste_animaux');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE caracter_category ADD animal_id INT NOT NULL');
        $this->addSql('ALTER TABLE caracter_category ADD CONSTRAINT FK_487ECF888E962C16 FOREIGN KEY (animal_id) REFERENCES liste_animaux (id)');
        $this->addSql('CREATE INDEX IDX_487ECF888E962C16 ON caracter_category (animal_id)');
        $this->addSql('ALTER TABLE liste_animaux DROP photo, DROP description');
    }
}
