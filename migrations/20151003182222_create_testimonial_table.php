<?php

use Phinx\Migration\AbstractMigration;

class CreateTestimonialTable extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('testimonials');
        $users->addColumn('title', 'string')
              ->addColumn('testimonial', 'text')
              ->addColumn('user_id', 'integer')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'Cascade', 'update' => 'Cascade'])
              ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('testimonials');
    }
}
