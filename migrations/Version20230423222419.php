<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423222419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE packing_list (id INT AUTO_INCREMENT NOT NULL, item_id INT NOT NULL, selected_trip_id INT NOT NULL, INDEX IDX_F43062BD126F525E (item_id), INDEX IDX_F43062BD4DF85090 (selected_trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE packing_list ADD CONSTRAINT FK_F43062BD126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE packing_list ADD CONSTRAINT FK_F43062BD4DF85090 FOREIGN KEY (selected_trip_id) REFERENCES selected_trip (id)');
        $this->addSql('ALTER TABLE item_user DROP FOREIGN KEY FK_45A392B2A76ED395');
        $this->addSql('ALTER TABLE item_user DROP FOREIGN KEY FK_45A392B2126F525E');
        $this->addSql('ALTER TABLE trip_user DROP FOREIGN KEY FK_A6AB4522A76ED395');
        $this->addSql('ALTER TABLE trip_user DROP FOREIGN KEY FK_A6AB4522A5BC2E0E');
        $this->addSql('DROP TABLE item_user');
        $this->addSql('DROP TABLE trip_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_user (item_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_45A392B2126F525E (item_id), INDEX IDX_45A392B2A76ED395 (user_id), PRIMARY KEY(item_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE trip_user (trip_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A6AB4522A5BC2E0E (trip_id), INDEX IDX_A6AB4522A76ED395 (user_id), PRIMARY KEY(trip_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE item_user ADD CONSTRAINT FK_45A392B2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_user ADD CONSTRAINT FK_45A392B2126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trip_user ADD CONSTRAINT FK_A6AB4522A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trip_user ADD CONSTRAINT FK_A6AB4522A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE packing_list DROP FOREIGN KEY FK_F43062BD126F525E');
        $this->addSql('ALTER TABLE packing_list DROP FOREIGN KEY FK_F43062BD4DF85090');
        $this->addSql('DROP TABLE packing_list');
    }
}
