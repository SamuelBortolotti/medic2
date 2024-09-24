<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528191657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, `admin` VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_ADMIN (`admin`), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, sam VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_SAM (sam), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY rendez_vous_ibfk_1');
        $this->addSql('DROP INDEX test ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous ADD patient INT AUTO_INCREMENT NOT NULL, DROP id, CHANGE praticien praticien_id VARCHAR(255) NOT NULL, ADD PRIMARY KEY (patient)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE rendez_vous MODIFY patient INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous ADD id INT NOT NULL, DROP patient, CHANGE praticien_id praticien VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT rendez_vous_ibfk_1 FOREIGN KEY (id) REFERENCES patient (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX test ON rendez_vous (id)');
    }
}
