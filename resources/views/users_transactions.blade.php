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
                                  <!--<a href="<?php echo URL::to('/ajouter-utilisateur') ?>">  <button class="btn btn-primary shadow-md mr-2">Ajouter un administrateur</button></a>
                                     <div class="dropdown ml-auto sm:ml-0">
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
                                
                                <th class="whitespace-nowrap">ID TRANSACTION</th>
                                <th class="whitespace-nowrap">NOM UTILISATEUR</th>
                                <th class="text-center whitespace-nowrap">OPERATION</th>
                                <th class="whitespace-nowrap">MONTANT</th>
                                <th class="whitespace-nowrap">DATE TRANSACTION</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($result as $value)  
                        <?php 
                                        
                                        if($value->type == 1) { $class="success"; $sign='+';}else{ $class="danger"; $sign='-';}
                                        
                                        ?>
                            <tr class="intro-x">
                                
                                <td class=" font-medium">{{$value->codepaiement}}</td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">{{$value->nom}} {{$value->prenoms}}</a> 
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$value->libelle}}</div>
                                </td>
                                <td class="text-center">{{$value->motif}}</td>
                                <td class="text-center"><div class="text-{{$class}}">{{$sign}}{{$value->montant}} F</div></td>
                                <td class="text-center">{{$all_model->periode($value->datecrea,$value->heurecrea)}}</td>
                               
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                    <a  href="<?php echo URL::to('/voir-recu/'.$value->codepaiement) ?>" title="Afficher le reçu"><button class="btn btn-primary py-1 px-2 mr-2">Reçu</button></a>
                                    </div>
                                     <!--class="flex btn items-center mr-3 tooltip" <i style="color:green" data-lucide="eye" class="w-4 h-4 mr-1"></i>   -->
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                        
                    <x-pagination url="{{$urlretour}}" current="{{$current}}" last="{{$last_page}}" />


                   
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


