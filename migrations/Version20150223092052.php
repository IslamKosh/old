<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150223092052 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE books_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE jobs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE nodes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE node_trans_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE books (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, meta JSON DEFAULT NULL, published BOOLEAN NOT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, deleted_by INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A1B2A92DE12AB56 ON books (created_by)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A1B2A9216FE72E1 ON books (updated_by)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A1B2A921F6FA0AF ON books (deleted_by)');
        $this->addSql('CREATE TABLE jobs (id INT NOT NULL, book_id INT DEFAULT NULL, assigned INT DEFAULT NULL, owner INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, instructions TEXT DEFAULT NULL, status VARCHAR(25) NOT NULL, type VARCHAR(25) NOT NULL, meta JSON DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, deleted_by INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A8936DC516A2B381 ON jobs (book_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8936DC5E1501A05 ON jobs (assigned)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8936DC57E3C61F9 ON jobs (owner)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8936DC5DE12AB56 ON jobs (created_by)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8936DC516FE72E1 ON jobs (updated_by)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8936DC51F6FA0AF ON jobs (deleted_by)');
        $this->addSql('CREATE TABLE nodes (id INT NOT NULL, status VARCHAR(25) NOT NULL, type VARCHAR(25) NOT NULL, meta JSON DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, deleted_by INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D3D05FCDE12AB56 ON nodes (created_by)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D3D05FC16FE72E1 ON nodes (updated_by)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D3D05FC1F6FA0AF ON nodes (deleted_by)');
        $this->addSql('CREATE TABLE node_trans (id INT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, body TEXT DEFAULT NULL, excerpt TEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_698A8C412C2AC5D3 ON node_trans (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX node_trans_unique_translation ON node_trans (translatable_id, locale)');
        $this->addSql('CREATE TABLE groups (id INT NOT NULL, name VARCHAR(255) NOT NULL, roles TEXT NOT NULL, description VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D39705E237E06 ON groups (name)');
        $this->addSql('COMMENT ON COLUMN groups.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE profiles (user_id INT NOT NULL, avatar VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, state VARCHAR(50) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, phone VARCHAR(50) DEFAULT NULL, PRIMARY KEY(user_id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, full_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E992FC23A8 ON users (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9A0D96FBF ON users (email_canonical)');
        $this->addSql('COMMENT ON COLUMN users.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE user_group (user_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX IDX_8F02BF9DA76ED395 ON user_group (user_id)');
        $this->addSql('CREATE INDEX IDX_8F02BF9DFE54D947 ON user_group (group_id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A9216FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A921F6FA0AF FOREIGN KEY (deleted_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC516A2B381 FOREIGN KEY (book_id) REFERENCES books (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5E1501A05 FOREIGN KEY (assigned) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC57E3C61F9 FOREIGN KEY (owner) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC516FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC51F6FA0AF FOREIGN KEY (deleted_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nodes ADD CONSTRAINT FK_1D3D05FCDE12AB56 FOREIGN KEY (created_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nodes ADD CONSTRAINT FK_1D3D05FC16FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nodes ADD CONSTRAINT FK_1D3D05FC1F6FA0AF FOREIGN KEY (deleted_by) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE node_trans ADD CONSTRAINT FK_698A8C412C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES nodes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profiles ADD CONSTRAINT FK_8B308530A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9DFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE jobs DROP CONSTRAINT FK_A8936DC516A2B381');
        $this->addSql('ALTER TABLE node_trans DROP CONSTRAINT FK_698A8C412C2AC5D3');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9DFE54D947');
        $this->addSql('ALTER TABLE books DROP CONSTRAINT FK_4A1B2A92DE12AB56');
        $this->addSql('ALTER TABLE books DROP CONSTRAINT FK_4A1B2A9216FE72E1');
        $this->addSql('ALTER TABLE books DROP CONSTRAINT FK_4A1B2A921F6FA0AF');
        $this->addSql('ALTER TABLE jobs DROP CONSTRAINT FK_A8936DC5E1501A05');
        $this->addSql('ALTER TABLE jobs DROP CONSTRAINT FK_A8936DC57E3C61F9');
        $this->addSql('ALTER TABLE jobs DROP CONSTRAINT FK_A8936DC5DE12AB56');
        $this->addSql('ALTER TABLE jobs DROP CONSTRAINT FK_A8936DC516FE72E1');
        $this->addSql('ALTER TABLE jobs DROP CONSTRAINT FK_A8936DC51F6FA0AF');
        $this->addSql('ALTER TABLE nodes DROP CONSTRAINT FK_1D3D05FCDE12AB56');
        $this->addSql('ALTER TABLE nodes DROP CONSTRAINT FK_1D3D05FC16FE72E1');
        $this->addSql('ALTER TABLE nodes DROP CONSTRAINT FK_1D3D05FC1F6FA0AF');
        $this->addSql('ALTER TABLE profiles DROP CONSTRAINT FK_8B308530A76ED395');
        $this->addSql('ALTER TABLE user_group DROP CONSTRAINT FK_8F02BF9DA76ED395');
        $this->addSql('DROP SEQUENCE books_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE jobs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE nodes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE node_trans_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE groups_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE nodes');
        $this->addSql('DROP TABLE node_trans');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE profiles');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE user_group');
    }
}
