<?php

use yii\db\Migration;

/**
 * Class m180730_072524_transport_avto
 */
class m180730_072524_transport_avto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $dataType = null;
        $tableOptions = null;

        switch ($this->db->driverName) {
            case 'mysql':
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                break;
            case 'sqlsrv':
            case 'mssql':
            case 'dblib':
                $dataType = $this->text();
                break;
        }
        $this->execute(file_get_contents('migrations/transport_avto.sql'));

    }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->execute('DROP DATABASE `transport_avto`');
    }


}
