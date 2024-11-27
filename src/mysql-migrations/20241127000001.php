<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Table\Column;

final class V20241127000001 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
//        $this->execute('DROP TABLE IF EXISTS doctor_clinic');
//        $this->execute('DROP TABLE IF EXISTS clinic');
//        $this->execute('DROP TABLE IF EXISTS doctor');

        $table = $this->table('doctor')
            // AbstractModel-nek "meta" oszlopai. Kotelezo oszlopok minden tablaban
            ->addColumn('record_status', Column::TINYINTEGER, [
                'limit' => 1,
                'default' => 1
            ])
            ->addColumn('created_at', Column::DATETIME, [
                'default' => 'CURRENT_TIMESTAMP'
            ])

            // Doctor oszlopai
            ->addColumn('name', Column::STRING, ['limit' => 255])
            ->addColumn('specialty', Column::STRING, ['limit' => 255])
            ->addIndex(['record_status'])
            ->addIndex(['name'])  // Index for faster lookup by name
            ->create();


        $table = $this->table('clinic')
            // AbstractModel-nek "meta" oszlopai. Kotelezo oszlopok minden tablaban
            ->addColumn('record_status', Column::TINYINTEGER, [
                'limit' => 1,
                'default' => 1
            ])
            ->addColumn('created_at', Column::DATETIME, [
                'default' => 'CURRENT_TIMESTAMP'
            ])

            // Clinic oszlopai
            ->addColumn('name', Column::STRING, ['limit' => 255])
            ->addIndex(['name'])  // Index for faster lookup by name
            ->create();


        // Create the "doctor_clinic" table Many-to-Many relationship
        $table = $this->table('doctor_clinic')
            ->addColumn('doctor_id', Column::INTEGER)
            ->addColumn('clinic_id', Column::INTEGER)
            ->create();

        // @todo "speciality" should be a separate enum table.
        // and there should be a "doctor_speciality" Many-to-Many relationship table too.
        // I just want to keep this easy for this example.

        // Insert test data into the "doctor" table
        $this->table('doctor')->insert([
            ['name' => 'Minta Béla', 'specialty' => 'Bőrgyógyász'],
            ['name' => 'Minta Anita', 'specialty' => 'Bőrgyógyász'],
            ['name' => 'Minta Balázs', 'specialty' => 'Nőgyógyász'],
            ['name' => 'Minta Bence', 'specialty' => 'Kardiológus'],
            ['name' => 'Minta Sándor', 'specialty' => 'Nőgyógyász'],
        ])->save();

        // Insert test data into the "clinic" table
        $this->table('clinic')->insert([
            ['name' => 'Minta Klinika'],
            ['name' => 'Teszt Klinika'],
        ])->save();

        // Insert test data into the "doctor_clinic" table Many-to-Many relationship
        $this->table('doctor_clinic')->insert([
            ['doctor_id' => 1, 'clinic_id' => 1],
            ['doctor_id' => 1, 'clinic_id' => 2],
            ['doctor_id' => 2, 'clinic_id' => 2],
            ['doctor_id' => 3, 'clinic_id' => 1],
            ['doctor_id' => 4, 'clinic_id' => 1],
            ['doctor_id' => 5, 'clinic_id' => 2],
        ])->save();
    }
}
