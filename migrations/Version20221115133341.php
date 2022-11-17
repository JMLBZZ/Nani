<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115133341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carousel CHANGE tag tag VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE home CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE text text LONGTEXT DEFAULT NULL, CHANGE is_active is_active TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE kid CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE firstname firstname VARCHAR(255) DEFAULT NULL, CHANGE birthdate birthdate DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE payment CHANGE date date DATE DEFAULT NULL, CHANGE price price INT DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE cardnum cardnum INT DEFAULT NULL, CHANGE carddate carddate DATE DEFAULT NULL, CHANGE cardcrypto cardcrypto INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule CHANGE date date DATE DEFAULT NULL, CHANGE timeslot timeslot VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carousel CHANGE tag tag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE title title VARCHAR(255) NOT NULL, CHANGE text text LONGTEXT NOT NULL, CHANGE is_active is_active TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE kid CHANGE name name VARCHAR(255) NOT NULL, CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE birthdate birthdate DATE NOT NULL');
        $this->addSql('ALTER TABLE payment CHANGE date date DATE NOT NULL, CHANGE price price INT NOT NULL, CHANGE type type VARCHAR(255) NOT NULL, CHANGE cardnum cardnum INT NOT NULL, CHANGE carddate carddate DATE NOT NULL, CHANGE cardcrypto cardcrypto INT NOT NULL');
        $this->addSql('ALTER TABLE schedule CHANGE date date DATE NOT NULL, CHANGE timeslot timeslot VARCHAR(255) NOT NULL');
    }
}
