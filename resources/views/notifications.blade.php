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
                           
                            
                    <div class="intro-y flex items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">
                            Mes notifications
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Form Layout -->
                            
                            <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                                        
                                        <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
                                        <?php $date=""; ?>
                                        @foreach($result as $value)

                                        <?php
                                        if($value->lu==0){
                                            $data =  array('lu' => 1 );
                                            $all_model->update_ligne('notifications', $data, 'id', $value->id);
                                           
                                        }


                                        if($date!=$value->datecrea){
                                            $date=$value->datecrea;
                                            ?>
                                        <div class="intro-x text-slate-500 text-xs text-center my-4">{{$all_model->periode2($value->datecrea)}}</div>
                                       <?php }?>
                                        
                                        


                                            <div class="intro-x relative flex items-center mb-3">
                                                <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                        <img alt="notification" src="<?php echo URL::to('/public/src/images/notifs'.$value->lu.'.jpg') ?>">
                                                    </div>
                                                </div>
                                                <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">{{$value->titre}}</div>
                                                        <div class="text-xs text-slate-500 ml-auto">{{$all_model->hm($value->heurecrea)}}</div>
                                                    </div>
                                                    <div class="text-slate-500 mt-1">{{$value->message}}</div>
                                                </div>
                                            </div>
                                            
                                            

                                        @endforeach
                                           
                                            
                                        </div>
                                    </div>
                            <!-- END: Form Layout -->
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

<script>
    function SendForm(){
        alert('ok');
    }
</script>