<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020054217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE class_group (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, book VARCHAR(255) DEFAULT NULL, color VARCHAR(255) NOT NULL, is_for_private_lessons TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, is_payed TINYINT(1) DEFAULT NULL, payment_date DATE DEFAULT NULL, base_amount DOUBLE PRECISION DEFAULT NULL, tax_percentage DOUBLE PRECISION NOT NULL, discount_applied TINYINT(1) DEFAULT NULL, total_amount DOUBLE PRECISION DEFAULT NULL, month SMALLINT NOT NULL, year SMALLINT NOT NULL, irpf_percentage DOUBLE PRECISION DEFAULT NULL, is_sended TINYINT(1) DEFAULT NULL, send_date DATE DEFAULT NULL, is_for_private_lessons TINYINT(1) DEFAULT NULL, is_sepa_xml_generated TINYINT(1) DEFAULT NULL, sepa_xmnl_generated_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_line (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, invoice_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, units DOUBLE PRECISION NOT NULL, price_unit DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D3D1D693F773E7CA (student_id), INDEX IDX_D3D1D6932989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receipt (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, date DATE DEFAULT NULL, is_payed TINYINT(1) DEFAULT NULL, payment_date DATE DEFAULT NULL, is_sended TINYINT(1) DEFAULT NULL, send_date DATE DEFAULT NULL, base_amount DOUBLE PRECISION DEFAULT NULL, discount_applied TINYINT(1) DEFAULT NULL, month INT NOT NULL, year INT NOT NULL, is_for_private_lessons SMALLINT DEFAULT NULL, is_sepa_xml_generated SMALLINT DEFAULT NULL, sepa_xml_generated_date DATE DEFAULT NULL, INDEX IDX_5399B645F773E7CA (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, color INT NOT NULL, description LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, position INT NOT NULL, show_in_homepage TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher_absence (id INT AUTO_INCREMENT NOT NULL, teacher_id INT DEFAULT NULL, type INT NOT NULL, day DATETIME NOT NULL, INDEX IDX_BB986D882EBB220A (teacher_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D693F773E7CA FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D6932989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B645F773E7CA FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE teacher_absence ADD CONSTRAINT FK_BB986D882EBB220A FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('ALTER TABLE event ADD group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72F68B530 FOREIGN KEY (group_id) REFERENCES class_group (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA72F68B530 ON event (group_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72F68B530');
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D693F773E7CA');
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D6932989F1FD');
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B645F773E7CA');
        $this->addSql('ALTER TABLE teacher_absence DROP FOREIGN KEY FK_BB986D882EBB220A');
        $this->addSql('DROP TABLE class_group');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_line');
        $this->addSql('DROP TABLE receipt');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE teacher_absence');
        $this->addSql('DROP INDEX IDX_3BAE0AA72F68B530 ON event');
        $this->addSql('ALTER TABLE event DROP group_id');
    }
}
