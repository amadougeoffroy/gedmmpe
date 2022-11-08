<?php use App\Models\All_model;
$all_model = new All_model();
?>
<div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex">
                    <img alt="GESTION RH" class="w-12" src="<?php echo URL::to('/public/dist/images/logo_mmpe.png') ?>">
                    
                    <span class="text-white text-lg ml-3"> GESTION RH </span> 
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>">Espace d'Administration</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Tabeal eee</li> -->
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Rechercher...">
                        <i data-lucide="search" class="search__icon dark:text-slate-500"></i> 
                    </div>
                    <!-- <a class="notification notification--light sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/profile-11.jpg') ?>">
                                    </div>
                                    <div class="ml-3">Russell Crowe</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">russellcrowe@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/profile-3.jpg') ?>">
                                    </div>
                                    <div class="ml-3">Sylvester Stallone</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">sylvesterstallone@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/profile-6.jpg') ?>">
                                    </div>
                                    <div class="ml-3">Hugh Jackman</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">hughjackman@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/profile-1.jpg') ?>">
                                    </div>
                                    <div class="ml-3">Denzel Washington</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">denzelwashington@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/preview-5.jpg') ?>">
                                </div>
                                <div class="ml-3">Dell XPS 13</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/preview-2.jpg') ?>">
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/preview-10.jpg') ?>">
                                </div>
                                <div class="ml-3">Nike Tanjun</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?php echo URL::to('/public/dist/images/preview-9.jpg') ?>">
                                </div>
                                <div class="ml-3">Sony Master Series A9G</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
                            </a>
                        </div>
                    </div> -->
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <?php @$notifs = $all_model->get_notifications(session()->get('userdata')['iduser'],5); 
                      $class = "";
                     if( count($notifs) > 0 ){
                        $class = "notification--bullet";
                     }
                   
                ?>
                <div class="intro-x dropdown mr-4 sm:mr-6">
                    <div class="dropdown-toggle notification {{$class}} cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Mes nouvelles notifications</div>
                            
                            @foreach($notifs  as $value)
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="notif" class="rounded-full" src="<?php echo URL::to('/public/src/images/notifs'.$value->lu.'.jpg') ?>">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">{{$value->titre}}</a> 
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{$all_model->periode($value->datecrea,$value->heurecrea)}}</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">{{$value->message}}<</div>
                                </div>
                            </div>
                            <br>
                            @endforeach
                            
                            <a href="<?php echo URL::to('/notifications') ?>" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">Voir toutes les notifications</a> 
                           
                            
                            
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <?php $photo = $all_model->get_field_by_id('app_rh_user','photo','id',session()->get('userdata')['iduser']);
                            $profil = 'categorie'; //$all_model->get_field_by_id('profil','libelle','id',session()->get('userdata')['profil']) ?>
                        <img alt="photo de profil" src="<?php echo URL::to('/storage/app/public/users/profil/'.$photo) ?>">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{session()->get('userdata')['username']}}</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{$profil}}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/changer-photo-profil') ?>" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="mi w-4 h-4 mr-2"></i> Photo de profil </a>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/modifier-informations') ?>" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="mi w-4 h-4 mr-2"></i> Modifier mes informations </a>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/modifier-mot-de-passe') ?>" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="mi w-4 h-4 mr-2"></i> Changer mot de passe </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/logout') ?>" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="mi w-4 h-4 mr-2"></i> Se Déconnecter </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>