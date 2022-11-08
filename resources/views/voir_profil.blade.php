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
                           
                            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                                <h2 class="text-lg font-medium mr-auto">
                                    {{$bandeau}}
                                </h2>
                                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                  
                                </div>
                            </div>
                            
                            
                            <div class="intro-y box px-5 pt-5 mt-5">
                        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo $all_model->user_photo_link($result->photo,'profil'); ?>">
                                </div>
                                <div class="ml-5">
                                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$result->prenoms}}</div>
                                    <div class="text-slate-500">{{$all_model->get_field_by_id('app_users_niveau','libelle','id',$result->niveau)}} </div>
                                </div>
                            </div>
                            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                                <div class="font-medium text-center lg:text-left lg:mt-3">CODE PARAINAGE : <strong> {{$result->code_parrainage}}</strong> </div>
                                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                    <div class="truncate sm:whitespace-normal flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="mail" data-lucide="mail" class="lucide lucide-mail w-4 h-4 mr-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{$result->email}} </div>
                                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="instagram" data-lucide="phone" class="lucide lucide-instagram w-4 h-4 mr-2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> {{$result->contact}} </div>
                                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" data-lucide="flag" class="lucide lucide-twitter w-4 h-4 mr-2"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> {{$result->nationalite}} </div>
                                </div>
                            </div>
                            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                               
                                <div class="text-center rounded-md w-20 py-3">
                                    <div class="font-medium text-primary text-xl">1</div>
                                    <div class="text-slate-500">Rang</div>
                                </div>
                                <div class="text-center rounded-md w-20 py-3">
                                    <div class="font-medium text-primary text-xl">3</div>
                                    <div class="text-slate-500">Filleuls</div>
                                </div> 
                                <div class="text-center rounded-md w-20 py-3">
                                    <div class="font-medium text-primary text-xl">20 000 f</div>
                                    <div class="text-slate-500">Profit</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="tab-content">
                                <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                    <div>
                                        <div class="flex">
                                            <div class="mr-auto">Progression globale</div>
                                            <div>20%</div>
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-1/2 mib" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>



                    <div class="tab-content mt-5">
                        <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="grid grid-cols-12 gap-6">
                                 <!-- BEGIN: INFORMATION -->
                                <div class="intro-y box col-span-12 lg:col-span-6">
                                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Information de l'utilisateur
                                        </h2>
                                        <!-- <div class="dropdown ml-auto" style="position: relative;">
                                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-horizontal" data-lucide="more-horizontal" class="lucide lucide-more-horizontal w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                            <div class="dropdown-menu w-40" id="_k520j47sq" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 20px, 0px);">
                                                <ul class="dropdown-content">
                                                    <li>
                                                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" data-lucide="plus" class="lucide lucide-plus w-4 h-4 mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Category </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="settings" data-lucide="settings" class="lucide lucide-settings w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg> Settings </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="p-5">
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="mr-auto">
                                                <a href="javascript:;" class="font-medium">Nom et prénoms</a> 
                                                <div class="text-slate-500 mt-1">{{$result->nom}} {{$result->prenoms}} (26 ans )</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="mr-auto">
                                                <a href="javascript:;" class="font-medium">Contacts et Email</a> 
                                                <div class="text-slate-500 mt-1">Tél : {{$result->contact}} </div>
                                                <div class="text-slate-500 mt-1"> Email : {{$result->email}}</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="mr-auto">
                                                <a href="javascript:;" class="font-medium">Nationalité</a> 
                                                <div class="text-slate-500 mt-1">{{$result->nationalite}}</div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="mr-auto">
                                                <a href="javascript:;" class="font-medium">Pièce d'identité</a> 
                                                <div class="text-slate-500 mt-1">Carte d'identité N° C01130265214 <a  href="<?php echo URL::to('/voir-info-piece/'.$result->iduser) ?>" title='Voir le profil'><button class="btn btn-outline-secondary py-1 px-2">Voir document</button> </a></div>
                                                
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="mr-auto">
                                                <a href="javascript:;" class="font-medium">Information bancaire</a> 
                                                <div class="text-slate-500 mt-1">Banque : NSIA | RIB : 0101 0101 0101 01101 11  <a  href="<?php echo URL::to('/voir-info-bancaire/'.$result->iduser) ?>" title='Voir le profil'><button class="btn btn-outline-secondary py-1 px-2">Voir document</button> </a></div>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <!-- END: INFORMATION -->
                                <!-- BEGIN: Progress -->
                                <div class="intro-y box col-span-12 lg:col-span-6">
                                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                        Progression par niveau dans le jeu
                                        </h2>
                                    </div>
                                    <div class="p-5">
                                        <div class="tab-content">
                                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                                @foreach($all_model->get_list_niveau_atteint($result->niveau) as $value )
                                                    <x-niveau_progress_level color="{{$value->couleur}}" lib="{{$value->libelle}}" obj="" iduser="{{$result->iduser}}" />
                                                @endforeach  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Progress -->
                                <!-- BEGIN: Filleuls -->
                                <div class="intro-y box col-span-12 lg:col-span-6"> 
                                    <div class="flex items-center p-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Les filleuls dans sa descendance 
                                        </h2>
                                        <button class="btn btn-outline-secondary hidden sm:flex">Tout voir</button>
                                    </div>
                                    <div class="p-5">
                                        @foreach($all_model->get_user_filleuls_with_level($result->iduser,$result->liaison,5) as $filleul)
                                        <div class="relative flex items-center mt-5">
                                            <div class="w-12 h-12 flex-none image-fit">
                                                <img alt="Photo user" class="rounded-full" src="<?php echo $all_model->user_photo_link($filleul->photo,'profil'); ?>">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <a href="" class="font-medium">{{$filleul->nom}} {{$filleul->prenoms}}</a> 
                                                <div class="text-slate-500 mr-5 sm:mr-5">Niveau : {{$filleul->libelle}}</div>
                                            </div>
                                            <div class="font-medium text-slate-600 dark:text-slate-500">Inscrit le : {{$all_model->periode2($filleul->datecrea)}}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- END: Filleuls -->
                                 <!-- BEGIN: INFORMATION -->
                                 <div class="intro-y box col-span-12 lg:col-span-6">
                                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Historique des opérations 
                                        </h2>
                                        
                                        <div class="dropdown ml-auto" style="position: relative;">
                                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-horizontal" data-lucide="more-horizontal" class="lucide lucide-more-horizontal w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                            <div class="dropdown-menu w-40" id="_k520j47sq" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 20px, 0px);">
                                                <ul class="dropdown-content">
                                                    
                                                    <li>
                                                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="settings" data-lucide="settings" class="lucide lucide-settings w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg>Paiements </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="settings" data-lucide="settings" class="lucide lucide-settings w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg> Retraits </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="settings" data-lucide="settings" class="lucide lucide-settings w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg> Tout voir </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="p-5">

                                        

                                        <div class="flex flex-col sm:flex-row mt-5">
                                            <div class="mr-auto">
                                                <a href="" class="font-medium">Retrait effectué</a> 
                                                <div class="text-slate-500 mt-1">10 Juil 2022 : 10:10 - Retrait partiel du profit</div>
                                            </div>
                                            <div class="flex">
                                                <div class="text-center">
                                                    <div class="bg-success/20 text-success rounded px-2 mt-1.5">150 000</div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex flex-col sm:flex-row mt-5">
                                            <div class="mr-auto">
                                                <a href="" class="font-medium">Paiement effectué</a> 
                                                <div class="text-slate-500 mt-1">10 Juil 2022 : 10:10 - Paiement de la prime d'inscription </div>
                                            </div>
                                            <div class="flex">
                                                <div class="text-center">
                                                    <div class="bg-pending/10 text-pending rounded px-2 mt-1.5">21 000</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col sm:flex-row mt-5">
                                            <div class="mr-auto">
                                                <a href="" class="font-medium">Paiement effectué</a> 
                                                <div class="text-slate-500 mt-1">10 Juil 2022 : 10:10 - Paiement de la prime d'inscription</div>
                                            </div>
                                            <div class="flex">
                                                <div class="text-center">
                                                    <div class="bg-pending/10 text-pending rounded px-2 mt-1.5">21 000</div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- END: INFORMATION -->
                                <!-- BEGIN: Latest Uploads -->
                                <div class="intro-y box col-span-12 lg:col-span-6">
                                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Les projets de l'utilisateur
                                        </h2>
                                       
                                        <button class="btn btn-outline-secondary hidden sm:flex">Tout afficher</button>
                                    </div>
                                    <div class="p-5">

                                        <div class="flex items-center mt-5" >
                                            <div class="file"> <a href="" class="w-12 file__icon file__icon--directory"></a> </div>
                                            <div class="ml-4">
                                                <a class="font-medium" href="">Ouverture d'une start-up dans l'imprimerie</a> 
                                                <div class="text-slate-500 text-xs mt-0.5">Budget : 1 000 000 F</div>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-horizontal" data-lucide="more-horizontal" class="lucide lucide-more-horizontal w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                                <div class="dropdown-menu w-40">
                                                    <ul class="dropdown-content">
                                                        <li>
                                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 00-3-3.87"></path><path d="M16 3.13a4 4 0 010 7.75"></path></svg> Voir le projet </a>
                                                        </li>
                                                        <li>
                                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path></svg> Supprimer </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center mt-5" >
                                            <div class="file"> <a href="" class="w-12 file__icon file__icon--directory"></a> </div>
                                            <div class="ml-4">
                                            <a class="font-medium" href="">Ouverture d'une start-up dans l'imprimerie</a> 
                                                <div class="text-slate-500 text-xs mt-0.5">Budget : 1 000 000 F</div>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-horizontal" data-lucide="more-horizontal" class="lucide lucide-more-horizontal w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                                <div class="dropdown-menu w-40">
                                                    <ul class="dropdown-content">
                                                        <li>
                                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 00-3-3.87"></path><path d="M16 3.13a4 4 0 010 7.75"></path></svg> Voir le projet </a>
                                                        </li>
                                                        <li>
                                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path></svg> Supprimer </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="flex items-center mt-5">
                                            <div class="file"> <a href="" class="w-12 file__icon file__icon--empty-directory"></a> </div>
                                            <div class="ml-4">
                                            <a class="font-medium" href="">Ouverture d'une start-up dans l'imprimerie</a> 
                                                <div class="text-slate-500 text-xs mt-0.5">Budget : 1 000 000 F</div>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-horizontal" data-lucide="more-horizontal" class="lucide lucide-more-horizontal w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                                <div class="dropdown-menu w-40">
                                                    <ul class="dropdown-content">
                                                        <li>
                                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 00-3-3.87"></path><path d="M16 3.13a4 4 0 010 7.75"></path></svg> Voir le projet </a>
                                                        </li>
                                                        <li>
                                                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path></svg> Supprimer </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- END: Latest Uploads -->
                                <!-- BEGIN: Latest Tasks -->
                                <div class="intro-y box col-span-12 lg:col-span-6">
                                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                        Contrôle du compte
                                        </h2>
                                    </div>
                                    <div class="p-5">
                                        <div class="tab-content">
                                            <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                                                
                                                

                                                <div class="flex items-center mt-5">
                                                    <div class="border-l-2 border-primary dark:border-primary pl-4">
                                                        <a href="" class="font-medium">Activer / Désactiver le compte</a> 
                                                        <div class="text-slate-500">Compte actif</div>
                                                    </div>
                                                    <div class="form-check form-switch ml-auto">
                                                        <input class="form-check-input" checked type="checkbox">
                                                    </div>
                                                </div>

                                                <div class="flex items-center mt-5">
                                                    <div class="border-l-2 border-primary dark:border-primary pl-4">
                                                        <a href="" class="font-medium">Vérification du compte</a> 
                                                        <div class="text-slate-500">Compte vérifié</div>
                                                    </div>
                                                    <div class="form-check form-switch ml-auto">
                                                        <input class="form-check-input" checked type="checkbox">
                                                    </div>
                                                </div>

                                                <div class="flex items-center mt-5">
                                                    <div class="border-l-2 border-primary dark:border-primary pl-4">
                                                        <a href="" class="font-medium">Autoriser le retrait du profit</a> 
                                                        <div class="text-slate-500">Retrait autorisé</div>
                                                    </div>
                                                    <div class="form-check form-switch ml-auto">
                                                        <input class="form-check-input" checked type="checkbox">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Latest Tasks -->
                               
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


