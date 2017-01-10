<?php
use Migrations\AbstractMigration;

class CreateMenuItemsPositions extends AbstractMigration
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
        $table = $this->table('menu_items_positions');
        $table->addColumn('menu_item_id', 'integer')
            ->addForeignKey('menu_item_id', 'menu_items', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addIndex(['menu_item_id',]);
        $table->addColumn('menu_position_id', 'integer')
            ->addForeignKey('menu_position_id', 'menu_positions', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addIndex(['menu_position_id',]);
        $table->create();
    }
}
