
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //configuracion
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionsRolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);

        $this->call(IvaConditionsSeeders::class);
        $this->call(CompanySeeders::class);

        $this->call(PayMethodsTableSeeder::class);
        $this->call(TypesSmallBoxesPruebaSeeders::class);
        $this->call(BanksTableSeeder::class);
        //$this->call(AdditionalsTableSeeder::class);

        $this->call(BrandsSeeders::class);
        $this->call(CategoriesSeeders::class);
        $this->call(ColorsSeeders::class);
        $this->call(ModelsPruebaSeeders::class);
        $this->call(SizesSeeders::class);


        //branches
        $this->call(BranchSeeders::class);

        //brancheables
        $this->call(BrancheablesSeeders::class);

        //providers
        $this->call(ProvidersTableSeeder::class);


        //testing

       // $this->call(BrandsSeeders::class);
       // $this->call(CategoriesSeeders::class);
       // $this->call(ColorsSeeders::class);
       // $this->call(ModelsPruebaSeeders::class);
       // $this->call(SizesSeeders::class);

        $this->call(ClientsSeedersConFaker::class);
        $this->call(ModelsCategoriesPruebaSeeders::class);
        $this->call(ModelsProvidersPruebaSeeders::class);


        //$this->call(ItemsPruebaSeeders::class);
       // $this->call(ModelsListsPricesPruebaSeeders::class);
       // $this->call(ModelsListsPricesItemsPruebaSeeders::class);

        //$this->call(PurchasesOrdersSeeders::class);
        //$this->call(PurchasesOrdersItemsSeeders::class);
        //$this->call(ItemsSeeders::class);

        //$this->call(DispatchesSeeders::class);
        //$this->call(DispatchesItemsSeeders::class);

        $this->call(FinancialsSeeders::class);
        $this->call(FinancialsDuesSeeders::class);
        $this->call(ProvidersPaymentsSeeders::class);




        Model::reguard();
    }
}
