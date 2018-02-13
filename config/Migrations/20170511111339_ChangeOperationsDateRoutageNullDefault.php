<?php
use Migrations\AbstractMigration;

class ChangeOperationsDateRoutageNullDefault extends AbstractMigration
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
        $operations = $this->table('operations');
        $operations->changeColumn('date_routage', 'datetime', ['default' => null,'null' => true,])->update();
    }
}
