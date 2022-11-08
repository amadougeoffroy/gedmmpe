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

                            <!-- BEGIN: Alert -->
                                <x-alert/>
                            <!-- END: Alert -->
                            <br>
                           
                            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                                <h2 class="text-lg font-medium mr-auto">
                                    Liste des comptes administrateurs
                                </h2>
                                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                  <a href="<?php echo URL::to('/ajouter-utilisateur') ?>">  <button class="btn btn-primary shadow-md mr-2">Ajouter un administrateur</button></a>
                                    <!-- <div class="dropdown ml-auto sm:ml-0">
                                        <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                                        </button>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="file-plus" class="w-4 h-4 mr-2"></i> New Category </a>
                                                </li>
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> New Group </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            
                            



                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0  p-5 mt-5">
                    <table class="table table-report sm:mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">PHOTO</th>
                                <th class="whitespace-nowrap">NOM UTILISATEUR</th>
                                <th class="whitespace-nowrap">EMAIL</th>
                                <th class="text-center whitespace-nowrap">INSCRIT LE</th>
                                <th class="text-center whitespace-nowrap">STATUS</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($result as $value)  

                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="profil photo" class=" rounded-full" src="<?php echo URL::to('/storage/app/public/users/profil/'.$value->photo) ?>" >
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">{{$value->nomprenom}}</a> 
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$value->categorie}}</div>
                                </td>
                                <td class="text-center">{{$value->login}}</td>
                                <td class="text-center"> 01/01/2022</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> <?php echo "Actif"  ;?> </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex btn items-center mr-3 tooltip" href="<?php echo URL::to('/modifier-utilisateur/'.$value->id) ?>" title='Modifier'> <i style="color:green" data-lucide="edit" class="w-4 h-4 mr-1"></i>  </a>
                                        <a class="flex btn items-center mr-3 tooltip"  title='Supprimer' onclick="supprimerLigne(<?php echo $value->id;?>)"> <i style="color:red" data-lucide="trash-2" class="w-4 h-4 mr-1"></i>  </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>

                    <input type="hidden" value="<?php echo URL::to('/suppression/'.$urlretour.'/'.$table) ?>" id="actionSuppression">

                </div>

                <x-pagination url="{{$urlretour}}" current="{{$current}}" last="{{$last_page}}" />

  

                        </div>
                        <!-- END: Content -->
   

            </div>
        </div>
        
        
        
        <!-- BEGIN: JS Assets-->
        <x-footer/>
        <!-- END: JS Assets-->





    </body>
</html>


