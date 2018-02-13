<?php
use Migrations\AbstractMigration;

class CreateDemandes extends AbstractMigration
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
        $table = $this->table('demandes');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('code_affaire', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('commentaire', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('ref_externe', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('partenaire_client_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('contact_client_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('partenaire_facture_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('contact_facture_id', 'integer', [
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
            'partenaire_client_id',
        ], [
            'name' => 'BY_PARTENAIRE_CLIENT_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'contact_client_id',
        ], [
            'name' => 'BY_CONTACT_CLIENT_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'partenaire_facture_id',
        ], [
            'name' => 'BY_PARTENAIRE_FACTURE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'contact_facture_id',
        ], [
            'name' => 'BY_CONTACT_FACTURE_ID',
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
