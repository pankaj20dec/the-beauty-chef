<?php if ( ! defined( 'ABSPATH' ) ) exit;

class NF_Database_Migrations_FieldMeta extends NF_Abstracts_Migration
{
    public function __construct()
    {
        parent::__construct(
            'nf3_field_meta',
            'nf_migration_create_table_field_meta'
        );
    }

    public function run()
    {
        $query = "CREATE TABLE IF NOT EXISTS $this->table_name (
            `id` int NOT NULL AUTO_INCREMENT,
            `parent_id` int NOT NULL,
            `key` longtext NOT NULL,
            `value` longtext,
            UNIQUE KEY (`id`)
        ) $this->charset_collate;";

        dbDelta( $query );
    }

}
