<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205144238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cidade_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE estado_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fazenda_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE imagem_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lance_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE leilao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE noticia_leilao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pessoa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_leilao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_lote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE telefone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_leilao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cidade (id INT NOT NULL, estado_id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6A98335C9F5A440B ON cidade (estado_id)');
        $this->addSql('CREATE TABLE estado (id INT NOT NULL, nome VARCHAR(100) NOT NULL, uf VARCHAR(5) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE fazenda (id INT NOT NULL, proprietario_id INT NOT NULL, estado_id INT NOT NULL, cidade_id INT NOT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) DEFAULT NULL, referencia VARCHAR(255) DEFAULT NULL, complemento VARCHAR(255) DEFAULT NULL, grupo_proprietario VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_70559C466759BAE5 ON fazenda (proprietario_id)');
        $this->addSql('CREATE INDEX IDX_70559C469F5A440B ON fazenda (estado_id)');
        $this->addSql('CREATE INDEX IDX_70559C469586CC8 ON fazenda (cidade_id)');
        $this->addSql('CREATE TABLE imagem (id INT NOT NULL, lote_id INT NOT NULL, texto VARCHAR(255) NOT NULL, arquivo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1A108309B172197C ON imagem (lote_id)');
        $this->addSql('CREATE TABLE lance (id INT NOT NULL, lote_id INT NOT NULL, valor NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_283BB6AEB172197C ON lance (lote_id)');
        $this->addSql('CREATE TABLE leilao (id INT NOT NULL, cidade_id INT NOT NULL, estado_id INT NOT NULL, tipo_leilao_id INT NOT NULL, status_leilao_id INT NOT NULL, data TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, dia VARCHAR(2) NOT NULL, mes VARCHAR(2) NOT NULL, ano VARCHAR(4) NOT NULL, local VARCHAR(255) NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_392E3A5D9586CC8 ON leilao (cidade_id)');
        $this->addSql('CREATE INDEX IDX_392E3A5D9F5A440B ON leilao (estado_id)');
        $this->addSql('CREATE INDEX IDX_392E3A5D19341412 ON leilao (tipo_leilao_id)');
        $this->addSql('CREATE INDEX IDX_392E3A5D73CF2B1D ON leilao (status_leilao_id)');
        $this->addSql('CREATE TABLE lote (id INT NOT NULL, leilao_id INT NOT NULL, fazenda_id INT NOT NULL, status_lote_id INT NOT NULL, numero VARCHAR(10) NOT NULL, quantidade INT NOT NULL, sexo VARCHAR(255) DEFAULT NULL, prazo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_65B4329FFB5AAB5C ON lote (leilao_id)');
        $this->addSql('CREATE INDEX IDX_65B4329FD4A3545F ON lote (fazenda_id)');
        $this->addSql('CREATE INDEX IDX_65B4329FB9A26EF9 ON lote (status_lote_id)');
        $this->addSql('CREATE TABLE noticia_leilao (id INT NOT NULL, leilao_id INT NOT NULL, nome VARCHAR(255) NOT NULL, texto VARCHAR(1000) NOT NULL, imagem VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_388B943AFB5AAB5C ON noticia_leilao (leilao_id)');
        $this->addSql('CREATE TABLE pessoa (id INT NOT NULL, estado_id INT NOT NULL, cidade_id INT NOT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(11) DEFAULT NULL, rg VARCHAR(40) DEFAULT NULL, nascimento DATE DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, endereco VARCHAR(255) DEFAULT NULL, bairro VARCHAR(255) DEFAULT NULL, complemento VARCHAR(255) DEFAULT NULL, cep VARCHAR(8) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1CDFAB829F5A440B ON pessoa (estado_id)');
        $this->addSql('CREATE INDEX IDX_1CDFAB829586CC8 ON pessoa (cidade_id)');
        $this->addSql('CREATE TABLE status_leilao (id INT NOT NULL, denominacao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE status_lote (id INT NOT NULL, denominacao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE telefone (id INT NOT NULL, pessoa_id INT NOT NULL, ddd VARCHAR(2) NOT NULL, numero VARCHAR(9) NOT NULL, nome_contato VARCHAR(255) DEFAULT NULL, ativo BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2132E361DF6FA0A5 ON telefone (pessoa_id)');
        $this->addSql('CREATE TABLE tipo_leilao (id INT NOT NULL, denominacao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cidade ADD CONSTRAINT FK_6A98335C9F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fazenda ADD CONSTRAINT FK_70559C466759BAE5 FOREIGN KEY (proprietario_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fazenda ADD CONSTRAINT FK_70559C469F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fazenda ADD CONSTRAINT FK_70559C469586CC8 FOREIGN KEY (cidade_id) REFERENCES cidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE imagem ADD CONSTRAINT FK_1A108309B172197C FOREIGN KEY (lote_id) REFERENCES lote (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lance ADD CONSTRAINT FK_283BB6AEB172197C FOREIGN KEY (lote_id) REFERENCES lote (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE leilao ADD CONSTRAINT FK_392E3A5D9586CC8 FOREIGN KEY (cidade_id) REFERENCES cidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE leilao ADD CONSTRAINT FK_392E3A5D9F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE leilao ADD CONSTRAINT FK_392E3A5D19341412 FOREIGN KEY (tipo_leilao_id) REFERENCES tipo_leilao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE leilao ADD CONSTRAINT FK_392E3A5D73CF2B1D FOREIGN KEY (status_leilao_id) REFERENCES status_leilao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lote ADD CONSTRAINT FK_65B4329FFB5AAB5C FOREIGN KEY (leilao_id) REFERENCES leilao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lote ADD CONSTRAINT FK_65B4329FD4A3545F FOREIGN KEY (fazenda_id) REFERENCES fazenda (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lote ADD CONSTRAINT FK_65B4329FB9A26EF9 FOREIGN KEY (status_lote_id) REFERENCES status_lote (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE noticia_leilao ADD CONSTRAINT FK_388B943AFB5AAB5C FOREIGN KEY (leilao_id) REFERENCES leilao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT FK_1CDFAB829F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT FK_1CDFAB829586CC8 FOREIGN KEY (cidade_id) REFERENCES cidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE telefone ADD CONSTRAINT FK_2132E361DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE fazenda DROP CONSTRAINT FK_70559C469586CC8');
        $this->addSql('ALTER TABLE leilao DROP CONSTRAINT FK_392E3A5D9586CC8');
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT FK_1CDFAB829586CC8');
        $this->addSql('ALTER TABLE cidade DROP CONSTRAINT FK_6A98335C9F5A440B');
        $this->addSql('ALTER TABLE fazenda DROP CONSTRAINT FK_70559C469F5A440B');
        $this->addSql('ALTER TABLE leilao DROP CONSTRAINT FK_392E3A5D9F5A440B');
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT FK_1CDFAB829F5A440B');
        $this->addSql('ALTER TABLE lote DROP CONSTRAINT FK_65B4329FD4A3545F');
        $this->addSql('ALTER TABLE lote DROP CONSTRAINT FK_65B4329FFB5AAB5C');
        $this->addSql('ALTER TABLE noticia_leilao DROP CONSTRAINT FK_388B943AFB5AAB5C');
        $this->addSql('ALTER TABLE imagem DROP CONSTRAINT FK_1A108309B172197C');
        $this->addSql('ALTER TABLE lance DROP CONSTRAINT FK_283BB6AEB172197C');
        $this->addSql('ALTER TABLE fazenda DROP CONSTRAINT FK_70559C466759BAE5');
        $this->addSql('ALTER TABLE telefone DROP CONSTRAINT FK_2132E361DF6FA0A5');
        $this->addSql('ALTER TABLE leilao DROP CONSTRAINT FK_392E3A5D73CF2B1D');
        $this->addSql('ALTER TABLE lote DROP CONSTRAINT FK_65B4329FB9A26EF9');
        $this->addSql('ALTER TABLE leilao DROP CONSTRAINT FK_392E3A5D19341412');
        $this->addSql('DROP SEQUENCE cidade_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE estado_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fazenda_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE imagem_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lance_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE leilao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lote_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE noticia_leilao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pessoa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_leilao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_lote_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE telefone_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_leilao_id_seq CASCADE');
        $this->addSql('DROP TABLE cidade');
        $this->addSql('DROP TABLE estado');
        $this->addSql('DROP TABLE fazenda');
        $this->addSql('DROP TABLE imagem');
        $this->addSql('DROP TABLE lance');
        $this->addSql('DROP TABLE leilao');
        $this->addSql('DROP TABLE lote');
        $this->addSql('DROP TABLE noticia_leilao');
        $this->addSql('DROP TABLE pessoa');
        $this->addSql('DROP TABLE status_leilao');
        $this->addSql('DROP TABLE status_lote');
        $this->addSql('DROP TABLE telefone');
        $this->addSql('DROP TABLE tipo_leilao');
    }
}
