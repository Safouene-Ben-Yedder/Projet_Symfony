<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603165648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_emploi ADD responsabilites LONGTEXT DEFAULT NULL, ADD benefices LONGTEXT DEFAULT NULL, ADD statut VARCHAR(255) NOT NULL, ADD location VARCHAR(255) NOT NULL, ADD salaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D198C92C83 FOREIGN KEY (id_recruteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_132AD0D198C92C83 ON offre_emploi (id_recruteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_emploi DROP FOREIGN KEY FK_132AD0D198C92C83');
        $this->addSql('DROP INDEX IDX_132AD0D198C92C83 ON offre_emploi');
        $this->addSql('ALTER TABLE offre_emploi DROP responsabilites, DROP benefices, DROP statut, DROP location, DROP salaire');
    }
}
