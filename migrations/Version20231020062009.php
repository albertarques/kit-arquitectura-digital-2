<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020062009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, bank_id INT DEFAULT NULL, dni VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, payment INT NOT NULL, INDEX IDX_34DCD1763CCE3900 (city_id), INDEX IDX_34DCD17675EE5022 (bank_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE persons ADD CONSTRAINT FK_34DCD1763CCE3900 FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE persons ADD CONSTRAINT FK_34DCD17675EE5022 FOREIGN KEY (bank_id) REFERENCES bank (id)');
        $this->addSql('ALTER TABLE event ADD teacher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72EBB220A FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA72EBB220A ON event (teacher_id)');
        $this->addSql('ALTER TABLE invoice ADD receipt_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449BDC2A67 FOREIGN KEY (receipt_id) REFERENCES receipt (id)');
        $this->addSql('CREATE INDEX IDX_906517449BDC2A67 ON invoice (receipt_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD1763CCE3900');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD17675EE5022');
        $this->addSql('DROP TABLE person');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72EBB220A');
        $this->addSql('DROP INDEX IDX_3BAE0AA72EBB220A ON event');
        $this->addSql('ALTER TABLE event DROP teacher_id');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449BDC2A67');
        $this->addSql('DROP INDEX IDX_906517449BDC2A67 ON invoice');
        $this->addSql('ALTER TABLE invoice DROP receipt_id');
    }
}
