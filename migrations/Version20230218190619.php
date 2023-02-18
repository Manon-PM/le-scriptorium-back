<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218190619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sheet ADD racial_ability_id INT NOT NULL');
        $this->addSql('ALTER TABLE sheet ADD CONSTRAINT FK_873C91E2E9615798 FOREIGN KEY (racial_ability_id) REFERENCES racial_ability (id)');
        $this->addSql('CREATE INDEX IDX_873C91E2E9615798 ON sheet (racial_ability_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sheet DROP FOREIGN KEY FK_873C91E2E9615798');
        $this->addSql('DROP INDEX IDX_873C91E2E9615798 ON sheet');
        $this->addSql('ALTER TABLE sheet DROP racial_ability_id');
    }
}
