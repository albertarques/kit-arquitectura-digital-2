<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020063018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE receipt_line (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, receipt_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, units DOUBLE PRECISION NOT NULL, price_unit DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_476F8F7AF773E7CA (student_id), INDEX IDX_476F8F7A2B5CA896 (receipt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE receipt_line ADD CONSTRAINT FK_476F8F7AF773E7CA FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE receipt_line ADD CONSTRAINT FK_476F8F7A2B5CA896 FOREIGN KEY (receipt_id) REFERENCES receipt (id)');
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B645F773E7CA');
        $this->addSql('DROP INDEX IDX_5399B645F773E7CA ON receipt');
        $this->addSql('ALTER TABLE receipt DROP student_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receipt_line DROP FOREIGN KEY FK_476F8F7AF773E7CA');
        $this->addSql('ALTER TABLE receipt_line DROP FOREIGN KEY FK_476F8F7A2B5CA896');
        $this->addSql('DROP TABLE receipt_line');
        $this->addSql('ALTER TABLE receipt ADD student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B645F773E7CA FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_5399B645F773E7CA ON receipt (student_id)');
    }
}
