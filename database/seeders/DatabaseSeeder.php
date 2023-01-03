<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ModulesTableSeeder::class,
            ResourcesTableSeeder::class,
            RolesTableSeeder::class,
            ModuleRoleTableSeeder::class,
            ResourceRoleTableSeeder::class,
            TypeUsersTableSeeder::class,
            RepresentativesTableSeeder::class,
            UsersTableSeeder::class,
            PlansTableSeeder::class,
            FeaturesTableSeeder::class,
            FeaturePlanTableSeeder::class,
            StatusesTableSeeder::class,
            ServicesTableSeeder::class,
            PrioritiesTableSeeder::class,
            TypesTableSeeder::class,
            PlanServiceTableSeeder::class,
            SectorsTableSeeder::class,
            EquipamentsTableSeeder::class
        ]);
    }
}
