<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250215124539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id_blog INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, idUser INT DEFAULT NULL, INDEX IDX_C0155143FE6E88D7 (idUser), PRIMARY KEY(id_blog)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id_commande INT AUTO_INCREMENT NOT NULL, date_commande DATE DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, idUser INT DEFAULT NULL, INDEX IDX_6EEAA67DFE6E88D7 (idUser), PRIMARY KEY(id_commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cour (id_cour INT AUTO_INCREMENT NOT NULL, cour VARCHAR(255) DEFAULT NULL, decription VARCHAR(255) DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, idUser INT DEFAULT NULL, INDEX IDX_A71F964FFE6E88D7 (idUser), PRIMARY KEY(id_cour)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id_event INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, date_debut DATE DEFAULT NULL, idUser INT DEFAULT NULL, INDEX IDX_3BAE0AA7FE6E88D7 (idUser), PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id_formation INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, formateur VARCHAR(255) DEFAULT NULL, date_debut DATETIME DEFAULT NULL, idUser INT DEFAULT NULL, INDEX IDX_404021BFFE6E88D7 (idUser), PRIMARY KEY(id_formation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan (id_plan INT AUTO_INCREMENT NOT NULL, langitude INT DEFAULT NULL, latitude INT DEFAULT NULL, PRIMARY KEY(id_plan)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, date_publication DATE NOT NULL, idUser INT DEFAULT NULL, INDEX IDX_5A8A6C8DFE6E88D7 (idUser), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id_produit INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, quantite INT NOT NULL, description_produit VARCHAR(255) DEFAULT NULL, idUser INT DEFAULT NULL, INDEX IDX_29A5EC27FE6E88D7 (idUser), PRIMARY KEY(id_produit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, tel INT DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143FE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cour ADD CONSTRAINT FK_A71F964FFE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7FE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFFE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DFE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143FE6E88D7');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFE6E88D7');
        $this->addSql('ALTER TABLE cour DROP FOREIGN KEY FK_A71F964FFE6E88D7');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7FE6E88D7');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFFE6E88D7');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DFE6E88D7');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FE6E88D7');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE cour');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
