<?php
use Migrations\AbstractMigration;

class CreateOffresInitiales extends AbstractMigration
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
        $table = $this->table('offre_initiales');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('volume_commande', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('volume_facutre', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('routage', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('nb_thematique', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('cpm', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('ht', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('tva', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('ttc', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('partenaire_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('demande_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('utilisateur_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('statut_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'partenaire_id',
        ], [
            'name' => 'BY_PARTENAIRE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'demande_id',
        ], [
            'name' => 'BY_DEMANDE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'utilisateur_id',
        ], [
            'name' => 'BY_UTILISATEUR_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'statut_id',
        ], [
            'name' => 'BY_STATUT_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
