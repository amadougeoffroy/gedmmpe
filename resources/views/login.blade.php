<!DOCTYPE html>

<html lang="en" class="light">

    <!-- BEGIN: Head -->
    <x-head title="{{$title}}"/>
    <!-- END: Head -->

    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                    
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Gedmmpe Administration" style="width:200px" src="<?php echo URL::to('/public/dist/images/logo_mmpe.png') ?>">
                         
                    </a>
                    <div class="my-auto">
                        <img alt="Gedmmpe Administration" class="-intro-x w-1/2 -mt-16" src="<?php echo URL::to('/public/dist/images/illustration.svg') ?>">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Prenez le contrôle de
                            <br>
                            votre espace d'administration.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Cet espace n'est reservé qu'aux administrateurs </div>
                    </div>
                </div>
                    
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form flex-->
                <div class="h-screen xl:h-auto xl:flex py-5 xl:py-0 my-10 xl:my-0">
                    <div style="" class="xl:hidden ml-10 mb-4  text-center" width="100%" >
                     <center>   <img  class="xl:hidden   text-center" style="width:200px" src="<?php echo URL::to('/public/dist/images/logo_mmpe.png') ?>" alt="">  </center>
                    </div>

                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <form action="<?php echo URL::to('/login') ?>" method="post">
                    {{@csrf_field()}}
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Se Connecter
                        </h2>
                         <!-- BEGIN: Alert -->
                         <x-alert/>
                                <!-- END: Alert -->
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Prenez le contrôle de votre espace d'administration. Cet espace n'est reservé qu'aux administrateurs</div>
                        <div class="intro-x mt-8">
                            <input type="text" name="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email">
                            <input type="password" name="password"  class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <!-- <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>-->
                            </div> 
                            <a href="">Mot de passe oublié ?</a> 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Me Connecter</button>
                            <!-- <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> -->
                        </div>
                        </form>
                        
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
       
         <!-- BEGIN: JS Assets-->
         <x-footer/>
        <!-- END: JS Assets-->

    </body>
</html>