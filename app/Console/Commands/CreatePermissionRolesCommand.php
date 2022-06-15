<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class CreatePermissionRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:save';
    protected $except=['logout','home','register','login','password.','permissions.','api.','debugbar.','generated::CIkxnYur6hV3Z9cC','generated::8SRveb5QEUlAFgCS','generated::MXCH89Pg6paZ7vdX','swaggervel.','requestApprove','visitStore','storeFilter','cityFilter','dashboard-get-products','get-orders','getProducts','create','addstore','thanks'

    ,'drugDosages','drugs','currencies','packages','tests','specialties','forms','suppliers','stores','receives','shipmentModels','sampleReceiveds','doctors','orders'    ];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            DB::beginTransaction();
                Artisan::call('cache:clear');
                Permission::whereNotNull('id')->delete();
                $this->info("Building .....!");
                $routeCollection = Route::getRoutes();
                $this->output->progressStart(count($routeCollection));
                $permission=[
                    // ['name' => 'Health','guard_name'=>'web'],
                    ['name' => 'PocketMoney','guard_name'=>'web'],
                    // ['name' => 'Repository','guard_name'=>'web'],
                    ['name' => 'Events','guard_name'=>'web'],
                    // ['name' => 'Samples','guard_name'=>'web'],
                    ['name' => 'Settings','guard_name'=>'web'],
                    ['name' => 'Users','guard_name'=>'web'],


                    ];
                Permission::insert($permission);
                foreach ($routeCollection as $route) {
                    if ($route->getName() != null ) {
                        try{
                            if (!Str::contains($route->getName(), $this->except)) {
                                Permission::findOrCreate($route->getName(),'web');
                                // $this->info("Name of route :".$route->getName());
                            }
                        }catch (Exception $e){

                        }
                    }
                }

                $permissions=Permission::pluck('id');
                $role=Role::where('name','like','%Super Admin%')->first();
                $role->syncPermissions($permissions);
                Artisan::call('cache:clear');
                $this->output->progressFinish();
                $this->info("Save all name of route :)");
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            $this->error(" make sure make db:seed ///You have error ".$th);

        }
    }
}
