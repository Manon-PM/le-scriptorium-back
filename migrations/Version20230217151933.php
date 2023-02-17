<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217151933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe_equipment (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, equipment_id INT NOT NULL, number INT NOT NULL, INDEX IDX_E26C95A48F5EA509 (classe_id), INDEX IDX_E26C95A4517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_stat (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, stat_id INT NOT NULL, priority TINYINT(1) NOT NULL, INDEX IDX_3EAB8AC78F5EA509 (classe_id), INDEX IDX_3EAB8AC79502F0B (stat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_racial_ability (race_id INT NOT NULL, racial_ability_id INT NOT NULL, INDEX IDX_6B7BC40D6E59D40D (race_id), INDEX IDX_6B7BC40DE9615798 (racial_ability_id), PRIMARY KEY(race_id, racial_ability_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sheet_way_ability (sheet_id INT NOT NULL, way_ability_id INT NOT NULL, INDEX IDX_686F32598B1206A5 (sheet_id), INDEX IDX_686F3259BC4541DA (way_ability_id), PRIMARY KEY(sheet_id, way_ability_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe_equipment ADD CONSTRAINT FK_E26C95A48F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE classe_equipment ADD CONSTRAINT FK_E26C95A4517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('ALTER TABLE classe_stat ADD CONSTRAINT FK_3EAB8AC78F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE classe_stat ADD CONSTRAINT FK_3EAB8AC79502F0B FOREIGN KEY (stat_id) REFERENCES stat (id)');
        $this->addSql('ALTER TABLE race_racial_ability ADD CONSTRAINT FK_6B7BC40D6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE race_racial_ability ADD CONSTRAINT FK_6B7BC40DE9615798 FOREIGN KEY (racial_ability_id) REFERENCES racial_ability (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sheet_way_ability ADD CONSTRAINT FK_686F32598B1206A5 FOREIGN KEY (sheet_id) REFERENCES sheet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sheet_way_ability ADD CONSTRAINT FK_686F3259BC4541DA FOREIGN KEY (way_ability_id) REFERENCES way_ability (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD hit_die INT NOT NULL');
        $this->addSql('ALTER TABLE sheet ADD user_id INT NOT NULL, ADD classe_id INT NOT NULL, ADD racial_ability_id INT NOT NULL');
        $this->addSql('ALTER TABLE sheet ADD CONSTRAINT FK_873C91E2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sheet ADD CONSTRAINT FK_873C91E28F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE sheet ADD CONSTRAINT FK_873C91E2E9615798 FOREIGN KEY (racial_ability_id) REFERENCES racial_ability (id)');
        $this->addSql('CREATE INDEX IDX_873C91E2A76ED395 ON sheet (user_id)');
        $this->addSql('CREATE INDEX IDX_873C91E28F5EA509 ON sheet (classe_id)');
        $this->addSql('CREATE INDEX IDX_873C91E2E9615798 ON sheet (racial_ability_id)');
        $this->addSql('ALTER TABLE way ADD classe_id INT NOT NULL');
        $this->addSql('ALTER TABLE way ADD CONSTRAINT FK_FBC034B98F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_FBC034B98F5EA509 ON way (classe_id)');
        $this->addSql('ALTER TABLE way_ability ADD way_id INT NOT NULL');
        $this->addSql('ALTER TABLE way_ability ADD CONSTRAINT FK_FA1E3C748C803113 FOREIGN KEY (way_id) REFERENCES way (id)');
        $this->addSql('CREATE INDEX IDX_FA1E3C748C803113 ON way_ability (way_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe_equipment DROP FOREIGN KEY FK_E26C95A48F5EA509');
        $this->addSql('ALTER TABLE classe_equipment DROP FOREIGN KEY FK_E26C95A4517FE9FE');
        $this->addSql('ALTER TABLE classe_stat DROP FOREIGN KEY FK_3EAB8AC78F5EA509');
        $this->addSql('ALTER TABLE classe_stat DROP FOREIGN KEY FK_3EAB8AC79502F0B');
        $this->addSql('ALTER TABLE race_racial_ability DROP FOREIGN KEY FK_6B7BC40D6E59D40D');
        $this->addSql('ALTER TABLE race_racial_ability DROP FOREIGN KEY FK_6B7BC40DE9615798');
        $this->addSql('ALTER TABLE sheet_way_ability DROP FOREIGN KEY FK_686F32598B1206A5');
        $this->addSql('ALTER TABLE sheet_way_ability DROP FOREIGN KEY FK_686F3259BC4541DA');
        $this->addSql('DROP TABLE classe_equipment');
        $this->addSql('DROP TABLE classe_stat');
        $this->addSql('DROP TABLE race_racial_ability');
        $this->addSql('DROP TABLE sheet_way_ability');
        $this->addSql('ALTER TABLE sheet DROP FOREIGN KEY FK_873C91E2A76ED395');
        $this->addSql('ALTER TABLE sheet DROP FOREIGN KEY FK_873C91E28F5EA509');
        $this->addSql('ALTER TABLE sheet DROP FOREIGN KEY FK_873C91E2E9615798');
        $this->addSql('DROP INDEX IDX_873C91E2A76ED395 ON sheet');
        $this->addSql('DROP INDEX IDX_873C91E28F5EA509 ON sheet');
        $this->addSql('DROP INDEX IDX_873C91E2E9615798 ON sheet');
        $this->addSql('ALTER TABLE sheet DROP user_id, DROP classe_id, DROP racial_ability_id');
        $this->addSql('ALTER TABLE way_ability DROP FOREIGN KEY FK_FA1E3C748C803113');
        $this->addSql('DROP INDEX IDX_FA1E3C748C803113 ON way_ability');
        $this->addSql('ALTER TABLE way_ability DROP way_id');
        $this->addSql('ALTER TABLE way DROP FOREIGN KEY FK_FBC034B98F5EA509');
        $this->addSql('DROP INDEX IDX_FBC034B98F5EA509 ON way');
        $this->addSql('ALTER TABLE way DROP classe_id');
        $this->addSql('ALTER TABLE classe DROP hit_die');
    }
}
