<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200621134935 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, ci VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, sabor VARCHAR(255) NOT NULL, relleno VARCHAR(255) NOT NULL, INDEX IDX_A7BB06153397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, user_id INT NOT NULL, fecha DATETIME NOT NULL, INDEX IDX_188D2E3BDE734E51 (cliente_id), INDEX IDX_188D2E3BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservaproducto (id INT AUTO_INCREMENT NOT NULL, reserva_id INT NOT NULL, producto_id INT NOT NULL, fechaentrega DATETIME NOT NULL, obs VARCHAR(255) NOT NULL, INDEX IDX_1220D0BAD67139E8 (reserva_id), INDEX IDX_1220D0BA7645698E (producto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06153397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservaproducto ADD CONSTRAINT FK_1220D0BAD67139E8 FOREIGN KEY (reserva_id) REFERENCES reserva (id)');
        $this->addSql('ALTER TABLE reservaproducto ADD CONSTRAINT FK_1220D0BA7645698E FOREIGN KEY (producto_id) REFERENCES producto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BDE734E51');
        $this->addSql('ALTER TABLE reservaproducto DROP FOREIGN KEY FK_1220D0BA7645698E');
        $this->addSql('ALTER TABLE reservaproducto DROP FOREIGN KEY FK_1220D0BAD67139E8');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BA76ED395');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE reservaproducto');
        $this->addSql('DROP TABLE user');
    }
}
