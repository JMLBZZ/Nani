<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124154221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kid ADD kids_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kid ADD CONSTRAINT FK_4523887CB71E5B2E FOREIGN KEY (kids_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4523887CB71E5B2E ON kid (kids_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kid DROP FOREIGN KEY FK_4523887CB71E5B2E');
        $this->addSql('DROP INDEX IDX_4523887CB71E5B2E ON kid');
        $this->addSql('ALTER TABLE kid DROP kids_id');
    }
}
