<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Address extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change() {
        // create the table
        $table = $this->table( 'address' );
        $table
            ->addColumn( 'recipient', 'string', array( 'limit' => 15, 'default' => '', 'comment' => '收件人' ) )
            ->addColumn( 'address', 'string', array('default' => '','comment' => '收货地址') )
            ->addColumn( 'phone', 'string', array( 'limit' => 11, 'comment' => '手机号' ) )
            ->addColumn( 'is_default', 'boolean', array('limit' => 0,'default'=>0,'comment' => '是否是默认地址' ) )
            ->create();
    }
}
