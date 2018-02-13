<?php
use Migrations\AbstractMigration;

class UpdateTaches extends AbstractMigration
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
        $table = $this->table('taches');
        $table->addColumn('fin_mois', 'boolean', array('after' => 'delai_minute'))
              ->update();
    }
}
