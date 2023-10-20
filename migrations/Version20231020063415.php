<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020063415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234D72A0A7A');
        $this->addSql('DROP INDEX IDX_2D5B0234D72A0A7A ON city');
        $this->addSql('ALTER TABLE city CHANGE province_id_id province_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234E946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234E946114A ON city (province_id)');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72EBB220A');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72F68B530');
        $this->addSql('DROP INDEX IDX_3BAE0AA72F68B530 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA72EBB220A ON event');
        $this->addSql('ALTER TABLE event ADD group_id INT DEFAULT NULL, ADD teacher_id INT DEFAULT NULL, DROP group_id_id, DROP teacher_id_id');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7FE54D947 FOREIGN KEY (group_id) REFERENCES class_group (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA741807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7FE54D947 ON event (group_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA741807E1D ON event (teacher_id)');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449BDC2A67');
        $this->addSql('DROP INDEX IDX_906517449BDC2A67 ON invoice');
        $this->addSql('ALTER TABLE invoice CHANGE receipt_id_id receipt_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517442B5CA896 FOREIGN KEY (receipt_id) REFERENCES receipt (id)');
        $this->addSql('CREATE INDEX IDX_906517442B5CA896 ON invoice (receipt_id)');
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D693F773E7CA');
        $this->addSql('DROP INDEX IDX_D3D1D693F773E7CA ON invoice_line');
        $this->addSql('ALTER TABLE invoice_line CHANGE student_id_id student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D693CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_D3D1D693CB944F1A ON invoice_line (student_id)');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD1763CCE3900');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD17675EE5022');
        $this->addSql('DROP INDEX IDX_34DCD1763CCE3900 ON person');
        $this->addSql('DROP INDEX IDX_34DCD17675EE5022 ON person');
        $this->addSql('ALTER TABLE person ADD city_id INT DEFAULT NULL, ADD bank_id INT DEFAULT NULL, DROP city_id_id, DROP bank_id_id');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD1768BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD17611C8FB41 FOREIGN KEY (bank_id) REFERENCES bank (id)');
        $this->addSql('CREATE INDEX IDX_34DCD1768BAC62AF ON person (city_id)');
        $this->addSql('CREATE INDEX IDX_34DCD17611C8FB41 ON person (bank_id)');
        $this->addSql('ALTER TABLE receipt_line DROP FOREIGN KEY FK_476F8F7AF773E7CA');
        $this->addSql('DROP INDEX IDX_476F8F7AF773E7CA ON receipt_line');
        $this->addSql('ALTER TABLE receipt_line CHANGE student_id_id student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receipt_line ADD CONSTRAINT FK_476F8F7ACB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_476F8F7ACB944F1A ON receipt_line (student_id)');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3375EE5022');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333CCE3900');
        $this->addSql('DROP INDEX IDX_B723AF3375EE5022 ON student');
        $this->addSql('DROP INDEX IDX_B723AF333CCE3900 ON student');
        $this->addSql('ALTER TABLE student ADD bank_id INT DEFAULT NULL, ADD parent INT DEFAULT NULL, DROP bank_id_id, DROP parent_id, CHANGE city_id_id city_id INT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3311C8FB41 FOREIGN KEY (bank_id) REFERENCES bank (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF338BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_B723AF3311C8FB41 ON student (bank_id)');
        $this->addSql('CREATE INDEX IDX_B723AF338BAC62AF ON student (city_id)');
        $this->addSql('ALTER TABLE teacher_absence DROP FOREIGN KEY FK_BB986D882EBB220A');
        $this->addSql('DROP INDEX IDX_BB986D882EBB220A ON teacher_absence');
        $this->addSql('ALTER TABLE teacher_absence CHANGE teacher_id_id teacher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teacher_absence ADD CONSTRAINT FK_BB986D8841807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_BB986D8841807E1D ON teacher_absence (teacher_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234E946114A');
        $this->addSql('DROP INDEX IDX_2D5B0234E946114A ON city');
        $this->addSql('ALTER TABLE city CHANGE province_id province_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234D72A0A7A FOREIGN KEY (province_id_id) REFERENCES province (id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234D72A0A7A ON city (province_id_id)');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7FE54D947');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA741807E1D');
        $this->addSql('DROP INDEX IDX_3BAE0AA7FE54D947 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA741807E1D ON event');
        $this->addSql('ALTER TABLE event ADD group_id_id INT DEFAULT NULL, ADD teacher_id_id INT DEFAULT NULL, DROP group_id, DROP teacher_id');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72EBB220A FOREIGN KEY (teacher_id_id) REFERENCES teacher (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72F68B530 FOREIGN KEY (group_id_id) REFERENCES class_group (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA72F68B530 ON event (group_id_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA72EBB220A ON event (teacher_id_id)');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517442B5CA896');
        $this->addSql('DROP INDEX IDX_906517442B5CA896 ON invoice');
        $this->addSql('ALTER TABLE invoice CHANGE receipt_id receipt_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449BDC2A67 FOREIGN KEY (receipt_id_id) REFERENCES receipt (id)');
        $this->addSql('CREATE INDEX IDX_906517449BDC2A67 ON invoice (receipt_id_id)');
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D693CB944F1A');
        $this->addSql('DROP INDEX IDX_D3D1D693CB944F1A ON invoice_line');
        $this->addSql('ALTER TABLE invoice_line CHANGE student_id student_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D693F773E7CA FOREIGN KEY (student_id_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_D3D1D693F773E7CA ON invoice_line (student_id_id)');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD1768BAC62AF');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD17611C8FB41');
        $this->addSql('DROP INDEX IDX_34DCD1768BAC62AF ON person');
        $this->addSql('DROP INDEX IDX_34DCD17611C8FB41 ON person');
        $this->addSql('ALTER TABLE person ADD city_id_id INT DEFAULT NULL, ADD bank_id_id INT DEFAULT NULL, DROP city_id, DROP bank_id');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD1763CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD17675EE5022 FOREIGN KEY (bank_id_id) REFERENCES bank (id)');
        $this->addSql('CREATE INDEX IDX_34DCD1763CCE3900 ON person (city_id_id)');
        $this->addSql('CREATE INDEX IDX_34DCD17675EE5022 ON person (bank_id_id)');
        $this->addSql('ALTER TABLE receipt_line DROP FOREIGN KEY FK_476F8F7ACB944F1A');
        $this->addSql('DROP INDEX IDX_476F8F7ACB944F1A ON receipt_line');
        $this->addSql('ALTER TABLE receipt_line CHANGE student_id student_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receipt_line ADD CONSTRAINT FK_476F8F7AF773E7CA FOREIGN KEY (student_id_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_476F8F7AF773E7CA ON receipt_line (student_id_id)');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3311C8FB41');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF338BAC62AF');
        $this->addSql('DROP INDEX IDX_B723AF3311C8FB41 ON student');
        $this->addSql('DROP INDEX IDX_B723AF338BAC62AF ON student');
        $this->addSql('ALTER TABLE student ADD bank_id_id INT DEFAULT NULL, ADD parent_id INT DEFAULT NULL, DROP bank_id, DROP parent, CHANGE city_id city_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3375EE5022 FOREIGN KEY (bank_id_id) REFERENCES bank (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_B723AF3375EE5022 ON student (bank_id_id)');
        $this->addSql('CREATE INDEX IDX_B723AF333CCE3900 ON student (city_id_id)');
        $this->addSql('ALTER TABLE teacher_absence DROP FOREIGN KEY FK_BB986D8841807E1D');
        $this->addSql('DROP INDEX IDX_BB986D8841807E1D ON teacher_absence');
        $this->addSql('ALTER TABLE teacher_absence CHANGE teacher_id teacher_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teacher_absence ADD CONSTRAINT FK_BB986D882EBB220A FOREIGN KEY (teacher_id_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_BB986D882EBB220A ON teacher_absence (teacher_id_id)');
    }
}
