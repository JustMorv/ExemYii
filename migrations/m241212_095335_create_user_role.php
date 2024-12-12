<?php

use yii\db\Migration;

/**
 * Class m241212_095335_create_user_role
 */
class m241212_095335_create_user_role extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', $this->string()->defaultValue('user'));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'role');
    }


}
