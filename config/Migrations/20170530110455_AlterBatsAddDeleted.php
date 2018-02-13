<?php
use Migrations\AbstractMigration;

class AlterBatsAddDeleted extends AbstractMigration
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
        $table = $this->table('bats');
        $table->addColumn('deleted', 'boolean', array('after' => 'demande_id','default' => 0, 'null' => false))
              ->update();
    }
}
