<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020051152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student ADD city_id_id INT NOT NULL, DROP city_id');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_B723AF333CCE3900 ON student (city_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333CCE3900');
        $this->addSql('DROP INDEX IDX_B723AF333CCE3900 ON student');
        $this->addSql('ALTER TABLE student ADD city_id INT DEFAULT NULL, DROP city_id_id');
    }
}
