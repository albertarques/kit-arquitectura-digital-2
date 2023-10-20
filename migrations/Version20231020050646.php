<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020050646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bank (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, account_number VARCHAR(255) DEFAULT NULL, swift_code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, province_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, INDEX IDX_2D5B0234D72A0A7A (province_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, begin DATETIME NOT NULL, end DATETIME NOT NULL, classroom INT NOT NULL, day_frequency_repeat INT DEFAULT NULL, until DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_student (event_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_3274069C71F7E88B (event_id), INDEX IDX_3274069CCB944F1A (student_id), PRIMARY KEY(event_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, tariff_id INT DEFAULT NULL, bank_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, payment INT NOT NULL, schedule VARCHAR(255) DEFAULT NULL, comments LONGTEXT DEFAULT NULL, surname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, city_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, dni VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, has_image_rights_accepted TINYINT(1) DEFAULT NULL, has_sepa_agreement_accepted TINYINT(1) DEFAULT NULL, INDEX IDX_B723AF3392348FD2 (tariff_id), INDEX IDX_B723AF3375EE5022 (bank_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tariff (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, price DOUBLE PRECISION NOT NULL, type INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234D72A0A7A FOREIGN KEY (province_id_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE event_student ADD CONSTRAINT FK_3274069C71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_student ADD CONSTRAINT FK_3274069CCB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3392348FD2 FOREIGN KEY (tariff_id) REFERENCES tariff (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3375EE5022 FOREIGN KEY (bank_id_id) REFERENCES bank (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234D72A0A7A');
        $this->addSql('ALTER TABLE event_student DROP FOREIGN KEY FK_3274069C71F7E88B');
        $this->addSql('ALTER TABLE event_student DROP FOREIGN KEY FK_3274069CCB944F1A');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3392348FD2');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3375EE5022');
        $this->addSql('DROP TABLE bank');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_student');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE tariff');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
