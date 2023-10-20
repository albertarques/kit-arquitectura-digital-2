<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020071915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bank ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE city ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE class_group ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE event ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE invoice_line ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE person ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE province ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE receipt ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE receipt_line ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE student ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tariff ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE teacher ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE teacher_absence ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD removed_at DATETIME DEFAULT NULL, ADD enabled TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bank DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE city DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE class_group DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE event DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE invoice DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE invoice_line DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE person DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE province DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE receipt DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE receipt_line DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE student DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE tariff DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE teacher DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
        $this->addSql('ALTER TABLE teacher_absence DROP created_at, DROP updated_at, DROP removed_at, DROP enabled');
    }
}
