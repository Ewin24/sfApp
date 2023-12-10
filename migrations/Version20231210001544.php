<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210001544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area_contacto DROP FOREIGN KEY FK_E44E17F46B505CA9');
        $this->addSql('DROP INDEX IDX_E44E17F46B505CA9 ON area_contacto');
        $this->addSql('ALTER TABLE area_contacto DROP contacto_id');
        $this->addSql('ALTER TABLE contacto ADD fk_area_contacto_id INT NOT NULL');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493C160191AE FOREIGN KEY (fk_area_contacto_id) REFERENCES area_contacto (id)');
        $this->addSql('CREATE INDEX IDX_2741493C160191AE ON contacto (fk_area_contacto_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area_contacto ADD contacto_id INT NOT NULL');
        $this->addSql('ALTER TABLE area_contacto ADD CONSTRAINT FK_E44E17F46B505CA9 FOREIGN KEY (contacto_id) REFERENCES contacto (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E44E17F46B505CA9 ON area_contacto (contacto_id)');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493C160191AE');
        $this->addSql('DROP INDEX IDX_2741493C160191AE ON contacto');
        $this->addSql('ALTER TABLE contacto DROP fk_area_contacto_id');
    }
}
