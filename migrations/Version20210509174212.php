<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509174212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, offre_emploi_id INT NOT NULL, utilisateur_id INT NOT NULL, rendez_vous_id INT NOT NULL, date_creation DATE NOT NULL, date_naissance DATE NOT NULL, nationnalite VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, etat_candidature INT NOT NULL, INDEX IDX_E33BD3B8B08996ED (offre_emploi_id), INDEX IDX_E33BD3B8FB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_E33BD3B891EF7EAA (rendez_vous_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_offre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_emploi (id INT AUTO_INCREMENT NOT NULL, categorie_offre_id INT NOT NULL, nom_offre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, exigences VARCHAR(255) NOT NULL, nbr_places INT NOT NULL, INDEX IDX_132AD0D1744F1130 (categorie_offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, presentiel TINYINT(1) NOT NULL, place VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, cin INT NOT NULL, telephone INT NOT NULL, date_naissance DATE NOT NULL, type INT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, etat INT NOT NULL, photo VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, nbr_postulation INT NOT NULL, date_last_login DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8B08996ED FOREIGN KEY (offre_emploi_id) REFERENCES offre_emploi (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B891EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id)');
        $this->addSql('ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D1744F1130 FOREIGN KEY (categorie_offre_id) REFERENCES categorie_offre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_emploi DROP FOREIGN KEY FK_132AD0D1744F1130');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8B08996ED');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B891EF7EAA');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8FB88E14F');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE categorie_offre');
        $this->addSql('DROP TABLE offre_emploi');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE utilisateur');
    }
}
