<?php
use Migrations\AbstractMigration;

class CreateMenuItems extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('menu_items');
        $table->addColumn('title', 'string', [
            'limit' => 255,
        ]);
        $table->addIndex(['title'], [
            'name' => 'ROLES_TITLE_UNIQUE',
            'unique' => true,
        ]);
        $table->addColumn('url', 'text', [
            'null' => false,
        ]);
        $table->addColumn('parent_id', 'integer', [
            'null' => true,
        ]);
        $table->addForeignKey('parent_id', 'menu_items', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE']);
        $table->addIndex(['parent_id',]);
        $table->addColumn('lft', 'integer', [
            'signed' => true,
        ]);
        $table->addColumn('rght', 'integer', [
            'signed' => true,
        ]);
        $table->addColumn('enabled', 'boolean', [
            'default' => true,
        ]);
        $table->addColumn('created_by', 'integer', [
            'null' => true,
        ]);
        $table->addForeignKey('created_by', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addIndex(['created_by',]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('deleted', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
