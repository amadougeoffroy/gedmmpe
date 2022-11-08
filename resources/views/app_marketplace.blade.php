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

                        <!-- BEGIN: Alert -->
                        <x-alert/>
                            <!-- END: Alert -->
                            <br>


                    <h2 class="intro-y text-lg font-medium mt-10">
                    {{$bandeau}}
                    </h2>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                            <button class="btn btn-primary shadow-md mr-2">Ajouter un utilisateur</button>
                            <div class="dropdown">
                                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                                    <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" class="lucide lucide-plus w-4 h-4" data-lucide="plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
                                </button>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 00-3-3.87"></path><path d="M16 3.13a4 4 0 010 7.75"></path></svg> Voir les AS  </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="message-circle" data-lucide="message-circle" class="lucide lucide-message-circle w-4 h-4 mr-2"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path></svg> Voir les autres </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="hidden md:block mx-auto text-slate-500">La liste contient les AS ayant terminé leur parcours et les utilisateurs à racheter</div>
                            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                                <div class="w-56 relative text-slate-500">
                                    <input type="text" class="form-control w-56 box pr-10" placeholder="Rechercher...">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN: Users Layout -->

                        @foreach($result as $value)
                        <div class="intro-y col-span-12 md:col-span-6">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="Profil photo" class="rounded-full" src="<?php echo $all_model->user_photo_link($value->photo,'profil'); ?>">
                                    </div>
                                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{$value->nom}} {{$value->prenoms}}</a> 
                                        <div class="text-slate-500 text-xs mt-0.5">{{$value->libelle}}</div>
                                    </div>
                                   
                                </div>

                                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                                        <div class="flex text-slate-500 text-xs">
                                            <div class="mr-auto">Progression</div>
                                            <div>20%</div>
                                        </div>
                                        <div class="progress h-1 mt-2">
                                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <a  href="<?php echo URL::to('/ecrire-aux-utilisateurs/'.$value->iduser) ?>" title="Ecrire à l'utilisateur"><button class="btn btn-primary py-1 px-2 mr-2">Message</button></a>
                                        <a  href="<?php echo URL::to('/user-marketplace-profil/'.$value->iduser) ?>" title='Voir le profil'><button class="btn btn-outline-secondary py-1 px-2 mib">Profil</button> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        

                        
                        <!-- END: Users Layout -->
                        <!-- BEGIN: Pagination -->
                        <x-pagination url="{{$urlretour}}" current="{{$current}}" last="{{$last_page}}" />
                        <!-- END: Pagination -->
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


