<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209183101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estudiante (id INT AUTO_INCREMENT NOT NULL, fk_cursos_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, INDEX IDX_3B3F3FADBA7AC0A (fk_cursos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluacion (id INT AUTO_INCREMENT NOT NULL, fk_cursos_id INT NOT NULL, asignatura VARCHAR(55) NOT NULL, fecha DATETIME NOT NULL, calificacion NUMERIC(3, 0) NOT NULL, INDEX IDX_DEEDCA53BA7AC0A (fk_cursos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pregunta (id INT AUTO_INCREMENT NOT NULL, fk_tipo_pregunta_id INT NOT NULL, fk_evaluacion_id INT NOT NULL, pregunta VARCHAR(255) NOT NULL, respuesta VARCHAR(255) NOT NULL, correcto TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_AEE0E1F752EBC991 (fk_tipo_pregunta_id), INDEX IDX_AEE0E1F7835F81C4 (fk_evaluacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_pregunta (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE estudiante ADD CONSTRAINT FK_3B3F3FADBA7AC0A FOREIGN KEY (fk_cursos_id) REFERENCES curso (id)');
        $this->addSql('ALTER TABLE evaluacion ADD CONSTRAINT FK_DEEDCA53BA7AC0A FOREIGN KEY (fk_cursos_id) REFERENCES curso (id)');
        $this->addSql('ALTER TABLE pregunta ADD CONSTRAINT FK_AEE0E1F752EBC991 FOREIGN KEY (fk_tipo_pregunta_id) REFERENCES tipo_pregunta (id)');
        $this->addSql('ALTER TABLE pregunta ADD CONSTRAINT FK_AEE0E1F7835F81C4 FOREIGN KEY (fk_evaluacion_id) REFERENCES evaluacion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estudiante DROP FOREIGN KEY FK_3B3F3FADBA7AC0A');
        $this->addSql('ALTER TABLE evaluacion DROP FOREIGN KEY FK_DEEDCA53BA7AC0A');
        $this->addSql('ALTER TABLE pregunta DROP FOREIGN KEY FK_AEE0E1F752EBC991');
        $this->addSql('ALTER TABLE pregunta DROP FOREIGN KEY FK_AEE0E1F7835F81C4');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE estudiante');
        $this->addSql('DROP TABLE evaluacion');
        $this->addSql('DROP TABLE pregunta');
        $this->addSql('DROP TABLE tipo_pregunta');
    }
}
