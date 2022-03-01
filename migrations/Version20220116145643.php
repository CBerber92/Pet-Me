<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220116145643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE class_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_animaux ADD class_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste_animaux ADD CONSTRAINT FK_2B84811C2A2852D4 FOREIGN KEY (class_category_id) REFERENCES class_category (id)');
        $this->addSql('CREATE INDEX IDX_2B84811C2A2852D4 ON liste_animaux (class_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_animaux DROP FOREIGN KEY FK_2B84811C2A2852D4');
        $this->addSql('DROP TABLE class_category');
        $this->addSql('DROP INDEX IDX_2B84811C2A2852D4 ON liste_animaux');
        $this->addSql('ALTER TABLE liste_animaux DROP class_category_id');
    }
}
