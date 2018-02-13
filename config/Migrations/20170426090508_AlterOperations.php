<?php
use Migrations\AbstractMigration;

class AlterOperations extends AbstractMigration
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
        $table = $this->table('operations');
        $table->changeColumn('ciblage', 'text')->update();
        $table->addColumn('routage', 'boolean', array('after' => 'volume'))->update();
    }
}
