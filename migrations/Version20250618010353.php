<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250618010353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE conta (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, numero INT NOT NULL, saldo NUMERIC(12, 2) NOT NULL, UNIQUE INDEX UNIQ_485A16C3DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE transacoe (id INT AUTO_INCREMENT NOT NULL, conta_origem_id INT NOT NULL, conta_destino_id INT NOT NULL, data_hora DATETIME NOT NULL, valor NUMERIC(12, 2) NOT NULL, INDEX IDX_12C8A45E332BCA77 (conta_origem_id), INDEX IDX_12C8A45E88825F03 (conta_destino_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(11) NOT NULL, telefone VARCHAR(11) NOT NULL, email VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE conta ADD CONSTRAINT FK_485A16C3DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE transacoe ADD CONSTRAINT FK_12C8A45E332BCA77 FOREIGN KEY (conta_origem_id) REFERENCES conta (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE transacoe ADD CONSTRAINT FK_12C8A45E88825F03 FOREIGN KEY (conta_destino_id) REFERENCES conta (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE conta DROP FOREIGN KEY FK_485A16C3DB38439E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE transacoe DROP FOREIGN KEY FK_12C8A45E332BCA77
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE transacoe DROP FOREIGN KEY FK_12C8A45E88825F03
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE conta
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE transacoe
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE usuario
        SQL);
    }
}
