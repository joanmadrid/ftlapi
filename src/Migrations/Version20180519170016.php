<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180519170016 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ship (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ship_ship_attribute (ship_id INT NOT NULL, ship_attribute_id INT NOT NULL, INDEX IDX_3B65729EC256317D (ship_id), INDEX IDX_3B65729E89799D9A (ship_attribute_id), PRIMARY KEY(ship_id, ship_attribute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ship_attribute (id INT AUTO_INCREMENT NOT NULL, ship_attribute_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, INDEX IDX_CF0C49076B4969F (ship_attribute_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ship_attribute_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ship_ship_attribute ADD CONSTRAINT FK_3B65729EC256317D FOREIGN KEY (ship_id) REFERENCES ship (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ship_ship_attribute ADD CONSTRAINT FK_3B65729E89799D9A FOREIGN KEY (ship_attribute_id) REFERENCES ship_attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ship_attribute ADD CONSTRAINT FK_CF0C49076B4969F FOREIGN KEY (ship_attribute_type_id) REFERENCES ship_attribute_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ship_ship_attribute DROP FOREIGN KEY FK_3B65729EC256317D');
        $this->addSql('ALTER TABLE ship_ship_attribute DROP FOREIGN KEY FK_3B65729E89799D9A');
        $this->addSql('ALTER TABLE ship_attribute DROP FOREIGN KEY FK_CF0C49076B4969F');
        $this->addSql('DROP TABLE ship');
        $this->addSql('DROP TABLE ship_ship_attribute');
        $this->addSql('DROP TABLE ship_attribute');
        $this->addSql('DROP TABLE ship_attribute_type');
    }
}
