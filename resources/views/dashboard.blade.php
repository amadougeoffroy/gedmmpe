<?php use App\Models\All_model;
$all_model = new All_model();
?>
<!DOCTYPE html>
 
<html lang="en" class="light">


    <!-- BEGIN: Head -->
    <x-head title="{{$title}}"/>
    <!-- END: Head -->


    <body class="main">


        <!-- BEGIN: Mobile Menu -->
        <x-mobilemenu/>
        <!-- END: Mobile Menu -->



        <!-- BEGIN: Top Bar -->
        <x-topbar  />
        <!-- END: Top Bar -->


        <div class="wrapper">
            <div class="wrapper-box">


                <!-- BEGIN: Side Menu -->
                <x-sidemenu/>
                <!-- END: Side Menu -->


                <!-- BEGIN: Content -->
                <div class="content">
                    <div class="relative">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 xl:col-span-9 2xl:col-span-9 z-10">

                                <!-- BEGIN: Alert -->
                                    <x-alert/>
                                <!-- END: Alert -->

                                <div class="col-span-12 mt-8">
                                <br>
                                    <div class="grid grid-cols-12 gap-6 mt-5">


                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="user" class="report-box__icon text-success"></i> 
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">10{{@$nombre['users']}}</div>
                                                    <div class="text-base text-slate-500 mt-1">Nombre d'employés</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i> 
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">10{{@$nombre['gain_total']}} </div>
                                                    <div class="text-base text-slate-500 mt-1">Nombre de demandes</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i> 
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">10{{@$nombre['gain_retire']}}</div>
                                                    <div class="text-base text-slate-500 mt-1">Nombre d'accidents</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i> 
                                                        <div class="ml-auto">
                                                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">10{{@$nombre['gain_disponible']}}</div>
                                                    <div class="text-base text-slate-500 mt-1">Formations</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                

                                
                                <div class="col-span-12 mt-6" style="min-height:800px">
                                    <div class="intro-y block sm:flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Liste des 10 derniers employés ajoutés
                                        </h2>
                                        
                                    </div>
                                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0" >
                                    <table class="table table-report sm:mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">MATRICULE</th>
                                <th class="whitespace-nowrap">NOM & PRENOMS</th>
                                <th class="text-center whitespace-nowrap">DATE NAISS.</th>
                                <th class="text-center whitespace-nowrap">DIPLOMES</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($liste_app_utilisateurs as $value)  
                        
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="profil photo" class="tooltip rounded-full" src="<?php echo $all_model->user_photo_link($value->photo,'profil'); ?>" title="Utilisateur">
                                        </div>
                                        <?php $i=0; $filleuls = $all_model->get_user_filleuls($value->iduser,$value->liaison,2); ?>
                                        @foreach($filleuls as $filleul)
                                        
                                        <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                            <img alt="profil photo" class="tooltip rounded-full" src="<?php echo $all_model->user_photo_link($filleul->photo,'profil'); ?>" title="Filleul {{$i+1}}">
                                        </div>
                                        <?php $i++; ?>
                                        @endforeach
                                        @if($i < 2 )
                                            @for($j=$i;$j < 2; $j++)
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="profil photo" class="tooltip rounded-full" src="<?php echo $all_model->user_photo_link('no.jpg','profil'); ?>" title="Filleul {{$j+1}}">
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">{{$value->nom}} {{$value->prenoms}}</a> 
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$value->libelle}}</div>
                                </td>
                                <td class="text-center">{{$all_model->periode($value->datecrea,$value->heurecrea)}}</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> <?php echo $value->actif ? "Actif" : "Inactif" ;?> </div>
                                </td>
                               
                                <td class="table-report__action w-56">
                                    
                                    <div class="flex justify-center items-center">
                                        <a  href="<?php echo URL::to('/ecrire-aux-agents/'.$value->iduser) ?>" title="Ecrire à l'utilisateur"><button class="btn btn-primary py-1 px-2 mr-2">Message</button></a>
                                        <a  href="<?php echo URL::to('/voir-profil-agents/'.$value->iduser) ?>" title='Voir le profil'><button class="mib btn btn-outline-secondary py-1 px-2">Profil</button> </a>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>

                                        

                                    </div>
                                    <a href="<?php echo URL::to('/app-agents') ?>" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">Voir tous les employés</a> 
                               <br>
                               <br>
                                </div>





                            </div>
                            
                            
                        </div>
                        <div class="report-box-4 w-full h-full grid grid-cols-12 gap-6 xl:absolute -mt-8 xl:mt-0 pb-6 xl:pb-0 top-0 right-0 z-30 xl:z-auto">
                            <div class="col-span-12 xl:col-span-3 xl:col-start-10 xl:pb-16 z-30">
                                <div class="h-full flex flex-col">
                                    <div class="box p-5 mt-6 bg-primary intro-x">
                                        <div class="flex flex-wrap gap-3">
                                            <div class="mr-auto">
                                                <div class="text-white text-opacity-70 dark:text-slate-300 flex items-center leading-3"> CHARGE SALARIALE <i data-lucide="alert-circle" class="tooltip w-4 h-4 ml-1.5" title="Montant total de recueilli sur la plateforme"></i> </div>
                                                <div class="text-white relative text-2xl font-medium leading-5 pl-4 mt-3.5">1.000.000 {{@$nombre['encaisse']}} <span class="absolute text-xl top-0  -mt-1.5"> F</span> </div>
                                            </div>
                                            <!-- <a class="flex items-center justify-center w-12 h-12 rounded-full bg-white dark:bg-darkmode-300 bg-opacity-20 hover:bg-opacity-30 text-white" href=""> <i data-lucide="plus" class="w-6 h-6"></i> </a> -->
                                        </div>
                                    </div>

                                    <div class="report-box-4__content xl:min-h-0 intro-x">
                                        <div class="col-span-12 xl:col-span-4 mt-6">
                                        <div class="intro-y flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                5 Demandes de congés
                                            </h2>
                                        </div>
                                        <div class="mt-5">
                                            <?php $i=1; ?>
                                        @foreach ($classement as $value)
                                            <div class="intro-y">
                                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                                        <img alt="profil photo" src="<?php echo $all_model->user_photo_link($value->photo,'profil'); ?>">
                                                    </div>
                                                    <div class="ml-4 mr-auto">
                                                        <div class="font-medium">{{$value->nom}} {{$value->prenoms}}</div>
                                                        <div class="text-slate-500 text-xs mt-0.5">{{$value->libelle}}</div>
                                                    </div>
                                                    <div class="py-1 px-2 rounded-full text-xs mib bg-success text-white cursor-pointer font-medium" >{{$i++}}</div>
                                                </div>
                                            </div>
                                        @endforeach 
                                            
                                            <a href="<?php echo URL::to('/users-classement') ?>" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">Voir le classement</a> 
                                        </div>
                                    </div>




                                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                                        <div class="intro-x flex items-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                5 dernières absences 
                                            </h2>
                                        </div>
                                        <div class="mt-5">
                                        @foreach ($transactions as $value)
                                        <?php 
                                        
                                        if($value->type == 1) { $class="success"; $sign='+';}else{ $class="danger"; $sign='-';}
                                        
                                        ?>
                                            <div class="intro-x">
                                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                        <img alt="profil photo" src="<?php echo $all_model->user_photo_link($value->photo,'profil'); ?>">
                                                    </div>
                                                    <div class="ml-4 mr-auto">
                                                        <div class="font-medium">{{$value->nom}}</div>
                                                        <div class="text-slate-500 text-xs mt-0.5">Le {{$all_model->date_fr($value->datecrea)}}</div>
                                                    </div>
                                                    <div class="text-{{$class}}">{{$sign}}{{$value->montant}} F</div>
                                                </div>
                                            </div>
                                        @endforeach 
                                            

                                            <a href="<?php echo URL::to('/users-transactions') ?>" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">Voir toutes les transactions</a> 
                                        </div>
                                    </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- END: Content -->


            </div>
        </div>
        
        
        
        <!-- BEGIN: JS Assets-->
        <x-footer/>
        <!-- END: JS Assets-->





    </body>
</html>