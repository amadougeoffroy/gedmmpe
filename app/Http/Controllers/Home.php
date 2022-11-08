<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\All_model;
//use App\Models\User;
//use App\Http\Controllers\Createurs;
//use Illuminate\Support\Facades\Http;

// use Notification;
// use App\Notifications\InfoMecene;

class Home extends Controller
{
    //


    public function home(Request $req){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Tableau de bord';
        $page_data['title'] = 'Tableau de bord';

        $page = 1;$size = 10;
        //$result = $all_model ->get_liste_app_utilisateurs($page,$size);
        $result = [];
        
        $page_data['liste_app_utilisateurs'] =$result;
        $page_data['nombre'] =[];
        $page_data['classement'] =[];
        $page_data['transactions'] =[];


       return view('dashboard', $page_data);
    }



    public function connexion(Request $req){
       
        // $all_model = new All_model();
        

        $page_data['bandeau'] = 'Page de connexion';
        $page_data['title'] = 'Page de connexion';
        
        // $page_data['crea'] = $all_model ->get_createurs(2,4);
        // $page_data['camp'] = $all_model ->get_campagnes();
        // $page_data['cat'] = $all_model ->get_categorie_camp_online();

       return view('login', $page_data);
    }


    public function liste_utilisateurs($page = null){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des utilisateurs';
        $page_data['title'] = 'Page de gestion des utilisateurs';
        $page_data['table'] = 'app_rh_user';
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        
        $page = $page?? 1;
        $page_data['current'] = $page;
        $size = 10;

        $result = $all_model ->get_liste_utilisateurs($page,$size);
        $page_data['result'] =$result;

        $last_page = ceil($all_model ->get_liste_utilisateurs_count()/$size);
        $page_data['last_page'] =$last_page;
        

       return view('liste_utilisateurs', $page_data);
    }
    

    public function app_utilisateurs($page = null){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des utilisateurs de l\'application mobile';
        $page_data['title'] = 'Page de gestion des utilisateurs';
        $page_data['table'] = 'app_users';
        $page_data['urlretour'] = explode('/',url()->current())[4];

        $all_model->update_user_niveau_all();
        
        $page = $page?? 1;
        $page_data['current'] = $page;
        $size = 10;

        $result = $all_model ->get_liste_app_utilisateurs($page,$size);
        $page_data['result'] =$result;

        $last_page = ceil($all_model ->get_liste_app_utilisateurs_count()/$size);
        $page_data['last_page'] =$last_page;
        
       return view('app_utilisateurs', $page_data);
    }


    public function users_classement($page  = null){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Classement des utilisateurs';
        $page_data['title'] = 'Classement des utilisateurs';
        $page_data['table'] = 'app_users';
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        $page = $page?? 1;
        $page_data['current'] = $page;
        $size = 10;

        $result = $all_model ->get_classement_app_utilisateurs($page,$size);
        $page_data['result'] =$result;

        $last_page = ceil($all_model ->get_classement_app_utilisateurs_count()/$size);
        $page_data['last_page'] =$last_page;
        

       return view('users_classement', $page_data);
    }


    public function users_transactions($page  = null){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des transactions';
        $page_data['title'] = 'Liste des transactions des utilisateurs';
        $page_data['table'] = 'app_users';
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        $page = $page?? 1;
        $page_data['current'] = $page;
        $size = 10;

        $result = $all_model ->get_transactions_app_utilisateurs($page,$size);
        $page_data['result'] =$result;

        $last_page = ceil($all_model ->get_transactions_app_utilisateurs_count()/$size);
        $page_data['last_page'] =$last_page;
        

       return view('users_transactions', $page_data);
    }



    public function demandes_retraits($page  = null){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des demandes de retrait en attente de traitement';
        $page_data['title'] = 'Liste des demandes de retrait des utilisateurs';
        $page_data['table'] = 'app_users_transactions';
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        $page = $page?? 1;
        $page_data['current'] = $page;
        $size = 10;

        $result = $all_model ->get_demandes_retrait_app_utilisateurs($page,$size);
        $page_data['result'] =$result;

        $last_page = ceil($all_model ->get_demandes_retrait_app_utilisateurs_count()/$size);
        $page_data['last_page'] =$last_page;
        

       return view('demandes_retraits', $page_data);
    }


    public function app_marketplace($page  = null){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des utilisateurs dans le marketplace';
        $page_data['title'] = 'Page de gestion du marketplace';
        $page_data['table'] = 'app_users';
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        $page = $page?? 1;
        $page_data['current'] = $page;
        $size = 10;

        $result = $all_model ->get_liste_app_utilisateurs($page,$size);
        $page_data['result'] =$result;

        $last_page = ceil($all_model ->get_liste_app_utilisateurs_count()/$size);
        $page_data['last_page'] =$last_page;
        

       return view('app_marketplace', $page_data);
    }

    
    public function voir_profil($iduser){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Profil de l\'utilisateur';
        $page_data['title'] = 'Profil de l\'utilisateur';
        
       
        $result = $all_model ->get_fullrow_user($iduser);
        $page_data['result'] =$result;


       return view('voir_profil', $page_data);
    }

    
    public function ajouter_utilisateur($id = null){
       
        $all_model = new All_model();
        
        $page_data['bandeau'] = 'Page de gestion des utilisateurs';
        $page_data['title'] = 'Ajouter un utilisateur';
        // $page_data['profil'] = $all_model ->get_table('profil');
        // $page_data['acces'] = $all_model ->get_table('acces');
        $page_data['result'] = '';
        
        if($id){
            $page_data['result'] = $all_model ->get_fullrow('app_rh_user','id',$id);
        }

       return view('ajouter_utilisateur', $page_data);
    }

    public function save_utilisateur(Request $req)
    {
        $all_model = new All_model();

        $email =$req->input('email');
        $username =$req->input('username');
        $profil =$req->input('profil');
        $acces =$req->input('acces');
        $actif =$req->input('actif')? 1 : 0;
        $reinitialiser = $req->input('reinitialiser') ? 1 : 0;
        $datecrea = $all_model->dateheure(3);
        $password = $all_model->generatePassword(6);
        $id = $req->input('id');

        $data =  array( 
            'acces' => $acces,
            'profil' => $profil,
            'username' => $username,
            'actif' => $actif,
            'photo' => 'default_avatar.webp',
            'login' => $email
        );

        if($reinitialiser==1){
            $data += [ "password" => $password ];
        }

        
        if($id){

            $all_model->update_ligne('app_rh_user', $data, 'id', $id);
            return redirect('ajouter-utilisateur')->with('success', 'Le compte utilisateur a été modifié avec succès.');
            exit;
        }else{

            $verif = $all_model->get_table_where('app_rh_user','login',$email);
            if(@!$verif[0]->login){
                $data += [ "datecrea" => $datecrea ];
                $data += [ "password" => $password ];

                $all_model->add_ligne('app_rh_user', $data) ;
                return redirect('ajouter-utilisateur')->with('success', 'Le compte utilisateur a été enregistré avec succès.');
                exit;

            }else{
                return redirect('ajouter-utilisateur')->with('danger', 'Ce mail est déjà lié à un compte utilisateur. Veuillez réessayer avec un autre mail.');
                exit;
            }
        }

        
        
    }



    public function liste_niveaux(){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des niveaux';
        $page_data['title'] = 'Paramétrages des niveaux';
        $table = 'app_users_niveau';
        $page_data['table'] = $table;
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        $page = 1;
        $size = 10;

        $result = $all_model ->get_table($table);
        $page_data['result'] =$result;

        $last_page = round(count($result)/$size);
        $page_data['last_page'] =$last_page;
        

       return view('liste_niveaux', $page_data);
    }
    
    public function modifier_niveaux($id = null){
       
        $all_model = new All_model();
        
        $page_data['bandeau'] = 'Paramétrages des niveaux';
        $page_data['title'] = 'Modifier le niveau';
        $page_data['result'] = '';
        
        if($id){
            $page_data['result'] = $all_model ->get_fullrow('app_users_niveau','id',$id);
        }

       return view('modifier_niveaux', $page_data);
    }

    public function save_niveaux(Request $req)
    {
        $all_model = new All_model();

        $libelle =$req->input('libelle');
        $prime =$req->input('prime');
        $couleur =$req->input('couleur');
        $id = $req->input('id');

        $data =  array( 
            'libelle' => $libelle,
            'prime' => $prime,
            'couleur' => $couleur
        );

        // if($reinitialiser==1){
        //     $data += [ "icone" => $icone ];
        // }

        
        if($id){

            $all_model->update_ligne('app_users_niveau', $data, 'id', $id);
            return redirect('para-niveaux')->with('success', 'Le niveau a été modifié avec succès.');
            exit;

        }else{

           
                return redirect('para-niveaux')->with('danger', 'Veuillez selectionner le niveau à modifier.');
                exit;
           
        }

        
        
    }

    
    public function liste_tarifs(){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Liste des tarifications';
        $page_data['title'] = 'Paramétrages des tarifications';
        $table = 'app_tarifs';
        $page_data['table'] = $table;
        $page_data['urlretour'] = explode('/',url()->current())[4];
        
        
        $page = 1;
        $size = 10;

        $result = $all_model ->get_table($table);
        $page_data['result'] =$result;

        $last_page = round(count($result)/$size);
        $page_data['last_page'] =$last_page;
        

       return view('liste_tarifs', $page_data);
    }  
    
    
    public function photo_profil(){
       
        $all_model = new All_model();
        

        $page_data['bandeau'] = 'Changer ma photo de profil';
        $page_data['title'] = 'Changer ma photo de profil';

       return view('photo_profil', $page_data);
    }

    
    public function modifier_informations(){
       
        $all_model = new All_model();
        $iduser = session()->get('userdata')['iduser'];
        $page_data['result'] = $all_model ->get_fullrow('app_rh_user','id',$iduser);

        $page_data['bandeau'] = 'Modifier mes informations';
        $page_data['title'] = 'Modifier mes informations';

       return view('modifier_informations', $page_data);
    }

    public function save_infos(Request $req)
    {
        $all_model = new All_model();


        $username =$req->input('username');
        $email =$req->input('email');
        $last_email =$req->input('last_email');
        $id = $req->input('id');

        if($email != $last_email ){
            @$verif = $all_model->get_fullrow('app_rh_user', 'login', $email);
            if(@$verif->id){
                return redirect('modifier-informations')->with('danger', 'Cette adresse email est déjà utilisée. Veuillez en choisir un autre.');
                exit;
            }
        }


        $data =  array( 
            'username' => $username,
            'login' => $email
        );

        $datanotif = array(
            'titre' => 'Informations mises à jour',
            'message' => 'Vous avez modifié les informations de votre compte gedmmpe Admin',
            'datecrea' => $all_model->dateheure(3) ,
            'heurecrea' => $all_model->dateheure(5) ,
            'iduser' => $id
        );$all_model->add_ligne('notifications', $datanotif) ;

        $all_model->update_ligne('app_rh_user', $data, 'id', $id);
        return redirect('modifier-informations')->with('success', 'Mes informations ont été modifiées avec succès.');
        exit;
        
        
    }
    
    
    public function notifications(){
       
        $all_model = new All_model();
        $iduser = session()->get('userdata')['iduser'];
        $page_data['result'] = $all_model ->get_notifications($iduser);

        $page_data['bandeau'] = 'Mes notifications';
        $page_data['title'] = 'Mes notifications';

       return view('notifications', $page_data);
    }

    
    public function modifier_password(){
       
        $all_model = new All_model();
        $iduser = session()->get('userdata')['iduser'];
        $page_data['result'] = $all_model ->get_fullrow('app_rh_user','id',$iduser);

        $page_data['bandeau'] = 'Modifier mon mot de passe';
        $page_data['title'] = 'Modifier mon mot de passe';

       return view('modifier_password', $page_data);
    }

    public function save_password(Request $req)
    {
        $all_model = new All_model();


        $password =$req->input('password');
        $apassword =$req->input('apassword');
        $cpassword =$req->input('cpassword');
        $id = $req->input('id');

        $verif = $all_model->get_fullrow('app_rh_user', 'id', $id);
        if($verif->password != $apassword){
            return redirect('modifier-mot-de-passe')->with('danger', 'Le mot de passe actuel est incorrect !');
            exit;
        }

        

        if($password != $cpassword){
            return redirect('modifier-mot-de-passe')->with('danger', 'Le mot de passe de confirmation ne correspond pas au mot de passe choisi !');
            exit;
        }

        if($apassword == $password){
            return redirect('modifier-mot-de-passe')->with('warning', 'Vous avez déjà utilisé ce mot de passe. Veuillez en choisir un autre.');
            exit;
        }
       


        $data =  array( 
            'mdp' => $password
        );

        $all_model->update_ligne('app_rh_user', $data, 'id', $id);

        $datanotif = array(
            'titre' => 'Mot de passe modifié',
            'message' => 'Vous avez modifié votre mot de passe.',
            'datecrea' => $all_model->dateheure(3) ,
            'heurecrea' => $all_model->dateheure(5) ,
            'iduser' => $id
        );$all_model->add_ligne('notifications', $datanotif) ;
       

        return redirect('modifier-mot-de-passe')->with('success', 'Mes informations ont été modifiées avec succès.');
        exit;
        
        
    }
    
    public function save_photo(Request $req)
    {
        $all_model = new All_model();

        
        $iduser = session()->get('userdata')['iduser'];

        if ($req->hasFile('photo')) { // si l'user a chargé des images
                $image = $req->file('photo'); 
                if($image->isValid()){
                    $path = $image->store('public/users/profil');
                    $pathpart = explode('/',$path);
                    $nomImage = $pathpart[3];
                    $imageName = $nomImage;
                }
        }else{
            return redirect('changer-photo-profil')->with('danger', 'Veuillez selectionner une image pour continuer.');
            exit;
        }

        $data =  array( 
            'photo' => $imageName
        );

        $datanotif = array(
            'titre' => 'Photo de profil modifiée',
            'message' => 'Vous avez modifié votre photo de profil.',
            'datecrea' => $all_model->dateheure(3) ,
            'heurecrea' => $all_model->dateheure(5) ,
            'iduser' => $iduser
        );$all_model->add_ligne('notifications', $datanotif) ;

        $all_model->update_ligne('app_rh_user', $data, 'id', $iduser);
        return redirect('changer-photo-profil')->with('success', 'La photo de profil a été modifiée avec succès.');
        exit;
        
        
    }
    
    public function modifier_tarifs($id = null){
       
        $all_model = new All_model();
        
        $page_data['bandeau'] = 'Paramétrages des tarifications';
        $page_data['title'] = 'Modifier le tarif';
        $page_data['result'] = '';
        
        if($id){
            $page_data['result'] = $all_model ->get_fullrow('app_tarifs','id',$id);
        }

       return view('modifier_tarifs', $page_data);
    }

    public function save_tarifs(Request $req)
    {
        $all_model = new All_model();

        $libelle =$req->input('libelle');
        $montant =$req->input('montant');
        $id = $req->input('id');

        $data =  array( 
            'libelle' => $libelle,
            'montant' => $montant
        );

       

        
        if($id){

            $all_model->update_ligne('app_tarifs', $data, 'id', $id);
            return redirect('para-tarifs')->with('success', 'Le tarif a été modifié avec succès.');
            exit;

        }else{

           
                return redirect('para-tarifs')->with('danger', 'Veuillez selectionner le tarif à modifier.');
                exit;
           
        }

        
        
    }

    // public function ajax_liste_admins(Request $req){
       
    //     $all_model = new All_model();

    //     $page = $req->input('page');
    //     $size = $req->input('size');

    //     $result = $all_model ->get_liste_for_ajax_table('app_rh_user',$page,$size,'profil','profil');
        
    //     $last_page = round(count($result)/$size);
       
    //     $data =  array( 
    //         'last_page' => $last_page,
    //         'data' => $result
    //     );
    //    return json_encode($data);
    // }


    public function login(Request $req)
    {
        $all_model = new All_model();
        $email =$req->input('email');
        $password_peppered =$req->input('password');
       

        $userinfo = $all_model->get_table_where('app_rh_user','login',$email);
      
        if(@!$userinfo[0]->login){

            return redirect('connexion')->with('danger', 'Ce mail n\'est lié à aucun compte.');
            exit;
        }
        
        if($password_peppered=!$userinfo[0]->mdp){ //verifiici
            return redirect('connexion')->with('danger', 'Mot de passe incorrect');
            exit;
        }

        // if(!password_verify($password_peppered, $userinfo[0]->password)){ //verifiici
        //     return redirect('connexion')->with('danger', 'Mot de passe incorrect');
        //     exit;
        // }

        
        // if($userinfo[0]->actif == 0){
        //     return redirect('connexion')->with('danger', 'Votre compte est inactif, veuillez contacter le service assistance pour en savoir plus');
        //     exit;
        // }
       
        $userdata['iduser'] = $userinfo[0]->id;
        //$userdata['actif'] = $userinfo[0]->actif;
        $userdata['username'] = $userinfo[0]->nomprenom;
        $userdata['profil'] = $userinfo[0]->categorie;
        
        
        

        $req->session()->put('userdata',$userdata);

       
        
       
        return redirect('dashboard')->with('info', 'Bonjour '.$userinfo[0]->nomprenom.' ! Bienvenue sur votre espace d\'administration RoySpace !');
        
    }



    public function deconnexion(Request $req){

        session()->flush();

        return redirect('/connexion')->with("success", "Vous êtes déconnecté avec succès, à bientôt !");
    }



    public function suppression_ligne($urlretour, $table , $id){
        $all_model = new All_model();

        $all_model->delete_ligne($table, 'id', $id);

        return redirect($urlretour)->with("success", "La ligne selectionnée a été supprimée avec succès !");
    }


    



}
