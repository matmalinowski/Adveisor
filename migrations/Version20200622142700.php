<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200622142700 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE geo_data ADD humidity DOUBLE PRECISION NOT NULL, ADD air_pressure DOUBLE PRECISION NOT NULL, DROP latitude, DROP longitude');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE geo_data ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL, DROP humidity, DROP air_pressure');
    }
}
