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
                            Modifier mon mot de passe
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                            <form action="<?php echo URL::to('/save-password') ?>" method="post" >
                                {{@csrf_field()}}
                                <div class="mt-3 input-form">
                                    <label for="apassword" class="form-label">Mot de passe actuel</label>
                                    <input name="apassword"  required id="apassword" type="password" class="form-control w-full" placeholder="Mot de passe actuel">
                                    
                                </div>
                                <div class="mt-3 input-form">
                                    <label for="password" class="form-label">Nouveau mot de passe</label>
                                    <input name="password"  required id="password" type="password" class="form-control w-full" placeholder="Nouveau mot de passe">
                                    
                                </div>
                                <div class="mt-3 input-form">
                                    <label for="cpassword" class="form-label">Confirmez le mot de passe</label>
                                    <input name="cpassword"  required id="cpassword" type="password" class="form-control w-full" placeholder="Confirmez le mot de passe">
                                </div>

                                
                               
                                <input type="hidden" value="{{@$result->id}}" name="id" id="id">

                                <div class="text-right mt-5 ">
                                    <button type="submit" class="btn btn-primary w-30">Modifier mon mot de passe</button>
                                </div>
                            </form>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
                                        <!-- <div id="success-notification-content" class="toastify-content hidden flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-circle" class="lucide lucide-check-circle text-success" data-lucide="check-circle"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> 
                                            <div class="ml-4 mr-4">
                                                <div class="font-medium">Opération réussie !</div>
                                                <div class="text-slate-500 mt-1"> Opération effectuée avec succès ! </div>
                                            </div>
                                        </div>

                                        <div id="failed-notification-content" class="toastify-content hidden flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x-circle" class="lucide lucide-x-circle text-danger" data-lucide="x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> 
                                            <div class="ml-4 mr-4">
                                                <div class="font-medium">Opération échouée !</div>
                                                <div class="text-slate-500 mt-1"> Veuillez remplir correctement le formulaire. </div>
                                            </div>
                                        </div> -->

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