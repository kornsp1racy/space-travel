<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419100254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_user (item_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_45A392B2126F525E (item_id), INDEX IDX_45A392B2A76ED395 (user_id), PRIMARY KEY(item_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE itinerary (id INT AUTO_INCREMENT NOT NULL, fk_user_id INT NOT NULL, fk_trip_id INT NOT NULL, day VARCHAR(50) NOT NULL, activity VARCHAR(255) NOT NULL, restaurant VARCHAR(255) NOT NULL, accomodation VARCHAR(255) NOT NULL, INDEX IDX_FF2238F65741EEB9 (fk_user_id), INDEX IDX_FF2238F655931322 (fk_trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mandatory_item_trip (id INT AUTO_INCREMENT NOT NULL, fk_item_id INT NOT NULL, fk_trip_id INT NOT NULL, INDEX IDX_2D6C75CDE2406F72 (fk_item_id), INDEX IDX_2D6C75CD55931322 (fk_trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, fk_user_id INT NOT NULL, date DATE NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_CFBDFA145741EEB9 (fk_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, destination VARCHAR(50) NOT NULL, duration INT NOT NULL, characteristics VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, host VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip_item (trip_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_3423B675A5BC2E0E (trip_id), INDEX IDX_3423B675126F525E (item_id), PRIMARY KEY(trip_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, passwort VARCHAR(255) NOT NULL, passport VARCHAR(255) NOT NULL, phone VARCHAR(100) NOT NULL, status VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_user ADD CONSTRAINT FK_45A392B2126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_user ADD CONSTRAINT FK_45A392B2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE itinerary ADD CONSTRAINT FK_FF2238F65741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE itinerary ADD CONSTRAINT FK_FF2238F655931322 FOREIGN KEY (fk_trip_id) REFERENCES trip (id)');
        $this->addSql('ALTER TABLE mandatory_item_trip ADD CONSTRAINT FK_2D6C75CDE2406F72 FOREIGN KEY (fk_item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE mandatory_item_trip ADD CONSTRAINT FK_2D6C75CD55931322 FOREIGN KEY (fk_trip_id) REFERENCES trip (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA145741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE trip_item ADD CONSTRAINT FK_3423B675A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trip_item ADD CONSTRAINT FK_3423B675126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_user DROP FOREIGN KEY FK_45A392B2126F525E');
        $this->addSql('ALTER TABLE item_user DROP FOREIGN KEY FK_45A392B2A76ED395');
        $this->addSql('ALTER TABLE itinerary DROP FOREIGN KEY FK_FF2238F65741EEB9');
        $this->addSql('ALTER TABLE itinerary DROP FOREIGN KEY FK_FF2238F655931322');
        $this->addSql('ALTER TABLE mandatory_item_trip DROP FOREIGN KEY FK_2D6C75CDE2406F72');
        $this->addSql('ALTER TABLE mandatory_item_trip DROP FOREIGN KEY FK_2D6C75CD55931322');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA145741EEB9');
        $this->addSql('ALTER TABLE trip_item DROP FOREIGN KEY FK_3423B675A5BC2E0E');
        $this->addSql('ALTER TABLE trip_item DROP FOREIGN KEY FK_3423B675126F525E');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_user');
        $this->addSql('DROP TABLE itinerary');
        $this->addSql('DROP TABLE mandatory_item_trip');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE trip');
        $this->addSql('DROP TABLE trip_item');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
