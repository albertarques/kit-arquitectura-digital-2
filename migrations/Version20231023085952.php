<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023085952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D693CB944F1A');
        $this->addSql('DROP INDEX IDX_D3D1D693CB944F1A ON invoice_line');
        $this->addSql('ALTER TABLE invoice_line DROP student_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_line ADD student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D693CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_D3D1D693CB944F1A ON invoice_line (student_id)');
    }
}
