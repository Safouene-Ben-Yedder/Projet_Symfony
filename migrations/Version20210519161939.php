<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519161939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regles DROP FOREIGN KEY FK_9040B7CEA76ED395');
        $this->addSql('DROP INDEX UNIQ_9040B7CEA76ED395 ON regles');
        $this->addSql('ALTER TABLE regles DROP user_id, CHANGE duree_expiration duree_expiration INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD regles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64920280705 FOREIGN KEY (regles_id) REFERENCES regles (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64920280705 ON user (regles_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regles ADD user_id INT DEFAULT NULL, CHANGE duree_expiration duree_expiration INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regles ADD CONSTRAINT FK_9040B7CEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9040B7CEA76ED395 ON regles (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64920280705');
        $this->addSql('DROP INDEX IDX_8D93D64920280705 ON user');
        $this->addSql('ALTER TABLE user DROP regles_id');
    }
}
