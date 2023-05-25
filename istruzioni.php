php artisan make:migration NomeMigration
php artisan make:migration create_nome_tabella_table

php artisan make:migration update_userrstable --table=users
php artisan make:migration addnome_colonnato nome_tabella

comandi che cancellano dati, da NON fare in produzione ma SOLO in sviluppo:
php artisan migrate:rollback
php artisan migrate:refresh

<!-- ------------------------------------------------------------------------------------------ -->

// Path: daje.php
<?php

php artisan preset:ui bootstrap

npm i

npm run dev

php artisan serve

php artisan make:model "Nome singolare"

php artisan make:controller Guest/NomeController

poi in NomeController.php 

class NomeController extends Controller
{
    public function index(){
        $variabilesss=Modello::all();
        return view('home',compact('variabilesss'));

    }

}


// *-------------------------------------------------------------------------



php artisan make:migration create_house_table //ci crea la tabella da compilare poi in laravell in database/migations/house_table

php artisan migrate                             //             per uploadarla in database

                            //voglio aggiungere una colonna rating_energy in house_table

php artisan make:migration addnome_rating_energy_to_house_table

//nel file creato in database aggiungo alla funzione up il nome colonna

Schema::table('house', function (Blueprint $table) {
    $table->string('rating_energy');
});

//in down scriviamo

Schema::table('house', function (Blueprint $table) {
    $table->dropColumn('rating_energy');
});

php artisan migrate     // cosi ri aggiorniamo la tabella con una colonna in piu ma sempre alla fine

//ma per inserire la tabella in mezzo a quelle gia create dobbiamo aggiungere alla funzione up 
Schema::create('house', function (Blueprint $table) {
    $table->string('rating_energy')->nullable()->after('name');
});

//facciamo rollback cosi:
 php artisan migrate:rollback
//e poi facciamo migrate cosi:
 php artisan migrate

 //in fase di sviluppo mi accorgo che c'è qualcosa che non va, devo fare 

 php artisan migrate:refresh  //cosi mi cancella tutto e ricrea tutto da capo ma senza i dati, da non fare mai in produzione


// *-------------------------------------------------------------------------


 //ma non è il massimo, lavarel ci fa popolare le tabelle per fare de itest con dei dati e per farlo dobbiamo usare i seeders che sono dei file che ci permettono di popolare le tabelle con dei dati finti
 //la classe Seeder contiene un metodo run che ci permette di popolare le tabelle con dei dati finti
 //per farlo occorre creare un file di seeder con il comando
    php artisan make:seeder NomeSeeder 
    
//bisogna importare il model con
use App\Models\NomeModello;

//la sintassi della funzione run è la seguente
public function run()
{
    $trains= //dati finti
    //oppure tramite ciclo foreach
    foreach($trains as $train){
        //creo un nuovo oggetto
        $newTrain=new Train();
        //popolo i campi
        $newTrain->name=$train['name'];
        $newTrain->description=$train['description'];
        $newTrain->save();
    }
}

//per popolare i dati con dati fake si utilizzano i Fakers, che sono dei metodi che ci permettono di popolare i campi con dati finti. Usiamo la classse Faker e la importiamo con
//sempre nel file di seeder

use Faker\Generator as Faker; //assieme a
use App\Models\NomeModello;

//usiamo la classe Faker cosi
public function run(Faker $faker)
{
    $trains= //dati finti
    //oppure tramite ciclo foreach
    foreach($trains as $train){
        //creo un nuovo oggetto
        $newTrain=new Train();
        //popolo i campi
        $newTrain->name=$faker->name();
        $newTrain->description=$faker->text();
        $newTrain->save();
    }
}

//il seeder ora si esegue con il comando:
php artisan db:seed --class=NomeSeeder