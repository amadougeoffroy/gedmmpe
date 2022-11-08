<?php

//namespace App;

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Url;
//use Illuminate\Notifications\Notifiable;

//use GuzzleHttp\Client;
//use Infobip\Api\SendSmsApi;
// use Infobip\Configuration;
// use Infobip\Model\SmsAdvancedTextualRequest;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;



class All_model extends Model
{
    
    //use  Notifiable;
    
    public function get_table($table) // ok

	{ 
		$result = DB::table($table)->get();
		return $result ;var_dump($result);exit; 
    }
    
	public function get_table_where($table,$id_name, $id)

	{

		$result = DB::table($table)->where($id_name , $id)->get();

		return $result;

	}
    
    public function get_max_id($table,$nomchamp) //ok 

	{

		$result = DB::table($table)->max($nomchamp);
		return $result;

    }
    
    public function get_quantity($table,$nomchamp,$idchamp,$id) //ok 
	{
		
		$result = DB::table($table)->where($idchamp, $id)->count($nomchamp);
		return $result;
    }
    
    public function get_fullrow($table, $id_name, $id) { //ok
		
		$result = DB::table($table)->where($id_name, $id)->get();
		return $result[0];

    }
    

    
    public function get_field_by_id($table, $field, $id_name, $id) { //ok

		$result = DB::table($table)->select($field)->where($id_name, $id)->get();
		return $result[0]->$field;
    }
    
    public function add_ligne_with_return_id($table, $data) { //ok

		// insertion dans la table
		$result = DB::table($table)->insertGetId($data);
		// retour de l'id inséré
		return $result;

    }

    public function add_ligne($table, $data) { //ok

		// insertion dans la table
		$result = DB::table($table)->insert($data);
		// retour de l'id inséré
		//return $result;

    }
    
    public function update_ligne($table, $data, $id_name, $id) { //ok

		// modification dans la table
		$result = DB::table($table)->where($id_name , $id)->update($data);

    }
    
    public function delete_ligne($table, $id_name, $id) { //ok

		// suppression d'une ligne de la table
		$result = DB::table($table)->where($id_name , $id)->delete();

	}



	public function get_notifications($iduser , $limit = NULL ) 
	{

		
		$ANDlimit = "";
		$luAND = "";
		if($limit){ $ANDlimit = "LIMIT 0,$limit"; $luAND = "lu=0 AND";}

		
		$result =  $query = DB::select("SELECT * FROM `notifications` WHERE $luAND iduser = '$iduser'  ORDER BY lu ASC, `datecrea` DESC, heurecrea DESC $ANDlimit");
		

		return $result;

	}




	public function get_liste_for_ajax_table($table,$page,$size,$tableAjoindre,$cleEtranger) 
	{
		$fin =($page-1) * $size;
		$result =  $query = DB::select("SELECT `$table`.*, `$tableAjoindre`.libelle as libelle FROM `$table`, `$tableAjoindre` WHERE `$table`.$cleEtranger =`$tableAjoindre`.id   LIMIT $size OFFSET $fin");
		return $result;

	}

	public function get_liste_utilisateurs($page,$size) 
	{ 
		$fin =($page-1) * $size;

		$result =  $query = DB::select("SELECT `app_rh_user`.* FROM `app_rh_user`    LIMIT $size OFFSET $fin");
		return $result;

	}

	public function get_liste_utilisateurs_count() 
	{ 
		
		$result =  $query = DB::select("SELECT COUNT(*) as nbre FROM `app_rh_user` ");
		
		return $result[0]->nbre;

	}

	public function get_liste_app_utilisateurs($page,$size) 
	{ 
		$fin =($page-1) * $size;
		
		$result =  $query = DB::select("SELECT `app_users`.*, `app_users_niveau`.libelle as libelle, app_pyramide.liaison as liaison  FROM `app_users`, `app_users_niveau`,app_pyramide WHERE `app_users`.niveau =`app_users_niveau`.id AND `app_users`.iduser =`app_pyramide`.iduser ORDER BY datecrea DESC, heurecrea DESC  LIMIT $size OFFSET $fin");
		return $result;

	}

	public function get_liste_app_utilisateurs_count() 
	{ 
		
		$result =  $query = DB::select("SELECT COUNT(*) as nbre FROM `app_users`, `app_users_niveau`,app_pyramide WHERE `app_users`.niveau =`app_users_niveau`.id AND `app_users`.iduser =`app_pyramide`.iduser  ");
		
		return $result[0]->nbre;

	}

	

	public function get_classement_app_utilisateurs($page,$size) 
	{ 
		$fin =($page-1) * $size;
		$result =  $query = DB::select("SELECT app_users.*,app_users_niveau.libelle as libelle FROM app_users,app_users_niveau WHERE  `app_users`.niveau =`app_users_niveau`.id AND actif=1 ORDER BY `app_users`.niveau DESC  LIMIT $size OFFSET $fin");
		return $result;

	}

	public function update_user_niveau_all()  // à modifier dans l'api aussi
	{   //
		$users = $query = DB::select("SELECT * FROM app_users  WHERE  paye = 1 ORDER BY rang DESC ");
		foreach($users as $user){
			$this->update_user_niveau($user->iduser);
		}

	}
	

	public function update_user_niveau($iduser) // à modifier dans l'api aussi
	{ 
		$user_infos = $this->get_fullrow('app_users','iduser',$iduser);
		
		if($user_infos->nbre_filleul==2){

			$filleuls = $this->get_table_where('app_users','code_parrain',$user_infos->code_parrainage);
			
			
			$niveau_filleul1 = $filleuls[0]->niveau;
			$niveau_filleul2 = $filleuls[1]->niveau;
			$niveau_commun = min($niveau_filleul1,$niveau_filleul2);
			$niveau_sup = $niveau_commun+1;
			
			if($user_infos->niveau != $niveau_sup){
				//s'il est toujours dans la course
				if($niveau_sup<=10){
					$prime = $this->get_field_by_id('app_users_niveau','prime','id',$niveau_sup);
					$gain_disponible = $user_infos->gain_total - $user_infos->gain_retire;
					$gain_total =  $user_infos->gain_total + $prime; 
					
					$data =  array( 
						'niveau' => $niveau_sup,
						'gain_total' => $gain_total,
						'gain_disponible' => $gain_disponible
					);
					
					$this->update_ligne('app_users', $data, 'iduser', $iduser);
				}else{
					//s'il a fini son tour complet (au dela de AS PRINCIPAL)
					//$tour = $user_infos->tour+1;
					$gain_disponible = $user_infos->gain_total - $user_infos->gain_retire;
					$data =  array( 
						'status' => 3,
						'gain_disponible' => $gain_disponible
					);
			
					$this->update_ligne('app_users', $data, 'iduser', $iduser);

					//les champs à réinitialiser quand quelqu'un va le remettre en course :
					// - status = 1
					// - code_parrainage = nouveau
					// - code_parrain = le nvo parrain
					// - niveau = 1
					// - tour = tour+1
					// - nbre_filleul = 0

				}
			}


		}



	}

	public function get_classement_app_utilisateurs_count() 
	{ 
		
		$result =  $query = DB::select("SELECT COUNT(*) as nbre FROM app_users,app_users_niveau WHERE  `app_users`.niveau =`app_users_niveau`.id AND actif=1   ");
		
		return $result[0]->nbre;

	}

	public function get_transactions_app_utilisateurs($page,$size) 
	{ 
		$fin =($page-1) * $size;
		$result =  $query = DB::select("SELECT app_users_transactions.*, app_users.nom, app_users.prenoms, app_users.photo,app_users_niveau.libelle as libelle FROM app_users_transactions,app_users,app_users_niveau WHERE app_users.iduser = app_users_transactions.iduser AND `app_users`.niveau =`app_users_niveau`.id AND app_users_transactions.status=4  ORDER BY datecrea DESC,heurecrea DESC LIMIT $size OFFSET $fin");
		
		return $result;

	}

	public function get_transactions_app_utilisateurs_count() 
	{ 
		
		$result =  $query = DB::select("SELECT COUNT(*) as nbre FROM app_users_transactions,app_users,app_users_niveau WHERE app_users.iduser = app_users_transactions.iduser AND `app_users`.niveau =`app_users_niveau`.id AND app_users_transactions.status=4   ");
		
		return $result[0]->nbre;

	}


	public function get_demandes_retrait_app_utilisateurs($page,$size) 
	{ 
		$fin =($page-1) * $size;
		$result =  $query = DB::select("SELECT app_users_transactions.*, app_users.nom, app_users.prenoms, app_users.photo,app_users_niveau.libelle as libelle FROM app_users_transactions,app_users,app_users_niveau WHERE app_users.iduser = app_users_transactions.iduser AND `app_users`.niveau =`app_users_niveau`.id AND app_users_transactions.status=1  ORDER BY datecrea ASC,heurecrea ASC LIMIT $size OFFSET $fin");
		
		return $result;

	}

	public function get_demandes_retrait_app_utilisateurs_count() 
	{ 
		
		$result =  $query = DB::select("SELECT COUNT(*) as nbre FROM app_users_transactions,app_users,app_users_niveau WHERE app_users.iduser = app_users_transactions.iduser AND `app_users`.niveau =`app_users_niveau`.id AND app_users_transactions.status=1   ");
		
		return $result[0]->nbre;

	}

	public function get_fullrow_user($iduser) 
	{ 

		$result =  $query = DB::select("SELECT `app_users`.*, `app_users_niveau`.libelle as libelle, app_pyramide.liaison as liaison  FROM `app_users`, `app_users_niveau`,app_pyramide WHERE `app_users`.niveau =`app_users_niveau`.id AND `app_users`.iduser =`app_pyramide`.iduser AND `app_users`.iduser = '$iduser' ");
		return $result[0];

	}

	public function get_user_filleuls($code_parrain) 
	{ 
		
		
		$result =  $query = DB::select("SELECT * FROM app_users WHERE code_parrain = '$code_parrain'  ORDER BY rang ASC ");


		return $result;
	}

	
	
	public function get_user_filleuls_pyramide($iduser,$liaison,$nbre) 
	{ 
		
		$LIMIT = "";
		if($nbre){
			$LIMIT = "LIMIT 0, $nbre";
		}
	
		$result =  $query = DB::select("SELECT app_pyramide.iduser as iduser,app_users.photo, nom, prenoms,datecrea FROM `app_pyramide`,app_users WHERE app_users.iduser= app_pyramide.iduser AND `liaison` like '$liaison%' AND app_pyramide.iduser != '$iduser' ORDER BY id ASC $LIMIT");


		return $result;
	}

	
	public function get_user_filleuls_with_level($iduser,$liaison,$nbre) 
	{ 
		
		$LIMIT = "";
		if($nbre){
			$LIMIT = "LIMIT 0, $nbre";
		}
	
		$result =  $query = DB::select("SELECT app_pyramide.iduser as iduser,app_users.photo, nom, prenoms,datecrea ,`app_users_niveau`.libelle as libelle FROM `app_pyramide`,app_users,app_users_niveau WHERE app_users.iduser= app_pyramide.iduser AND `app_users`.niveau =`app_users_niveau`.id AND `liaison` like '$liaison%' AND app_pyramide.iduser != '$iduser' ORDER BY app_pyramide.id ASC $LIMIT");


		return $result;
	}

		
	public function get_classement_users($nbre) 
	{ 
		
		$LIMIT = "";
		if($nbre){
			$LIMIT = "LIMIT 0, $nbre";
		}
		$result =  $query = DB::select("SELECT app_users.*,app_users_niveau.libelle as libelle FROM app_users,app_users_niveau WHERE  `app_users`.niveau =`app_users_niveau`.id AND actif=1 ORDER BY `app_users`.niveau DESC $LIMIT");

		return $result;
	}

		
	public function get_transactions_users($nbre) 
	{ 
		
		$LIMIT = "";
		if($nbre){
			$LIMIT = "LIMIT 0, $nbre";
		}
		$result =  $query = DB::select("SELECT app_users_transactions.*, app_users.nom, app_users.prenoms, app_users.photo FROM app_users_transactions,app_users WHERE app_users.iduser = app_users_transactions.iduser AND  app_users_transactions.status=4 ORDER BY datecrea DESC,heurecrea DESC $LIMIT");

		return $result;
	}

	
	public function get_nombre_dashboard() 
	{ 
		
		//montant total recueilli ( toutes les entrés d'argent)
		$result =  $query = DB::select("SELECT SUM(montant) as montant FROM  app_users_transactions WHERE  app_users_transactions.status = 4 AND app_users_transactions.type =1 ");
		$nombre['encaisse'] = $result[0]->montant;

		//montant total retiré ( toutes les entrés d'argent)
		$result =  $query = DB::select("SELECT SUM(montant) as montant FROM  app_users_transactions WHERE  app_users_transactions.status = 4 AND app_users_transactions.type =2 ");
		$nombre['retire'] = $result[0]->montant;

		//total user
		$result =  $query = DB::select("SELECT COUNT(iduser) as nbre FROM  app_users ");
		$nombre['users'] = $result[0]->nbre;

		//total gain_disponible for users
		$result =  $query = DB::select("SELECT SUM(gain_disponible) as montant FROM  app_users  ");
		$nombre['gain_disponible'] = $result[0]->montant;

		//total gain_disponible for users
		$result =  $query = DB::select("SELECT SUM(gain_total) as montant FROM  app_users  ");
		$nombre['gain_total'] = $result[0]->montant;

		//total gain_disponible for users
		$result =  $query = DB::select("SELECT SUM(gain_retire) as montant FROM  app_users  ");
		$nombre['gain_retire'] = $result[0]->montant;


		return $nombre;
	}


	public function get_list_niveau_atteint($niveau) 
	{ 
		
		
		$result =  $query = DB::select("SELECT  * FROM app_users_niveau WHERE id <= '$niveau' ");


		return $result;
	}

	public function get_mode_infos($iduser , $mode ) 
	{

		
		$result =  $query = DB::select("SELECT * FROM `users_modepaiement` WHERE `iduser` = '$iduser' AND idmodepaiement = '$mode' ");


		return $result[0];

	}



	public function get_id_unique($pre, $table , $nbre ) 
	{
		do{

			$id = $pre.$this->generateNum($nbre);
			$result =  $query = DB::select("SELECT * FROM $table  WHERE id = '$id' ");

		}while($result);

		
		return $id ;


	}

	
	public function generer_otp($iduser) 
	{   
		
		$result =  $query = DB::select("SELECT *  FROM `code_otp` WHERE   iduser ='$iduser' ");
		if(@$result[0]){
			$to_time = strtotime( $this->dateheure(2));
			$from_time = strtotime($result[0]->datecrea." ".$result[0]->heurecrea);
			$minutes = round(abs($to_time - $from_time) / 60,2);
			if($minutes>5){
				$otp = substr(str_shuffle("09182736455463728190"), 0, 4);
				$this->delete_ligne('code_otp', 'iduser', $iduser);
				$data = array(
							'code' => $otp,
							'iduser' => $iduser,
							'datecrea' => $this->dateheure(3) ,
							'heurecrea' => $this->dateheure(5) 
						);
						$this->add_ligne('code_otp', $data) ;
			}else{
				$otp = '';
			}
			
		}else{
				$otp = substr(str_shuffle("09182736455463728190"), 0, 4);
				$data = array(
							'code' => $otp,
							'iduser' => $iduser,
							'datecrea' => $this->dateheure(3) ,
							'heurecrea' => $this->dateheure(5) 
						);
						$this->add_ligne('code_otp', $data) ;
		}
		
		return $otp;


	}
	
	////RENVOYER L'HEURE SERVEUR EN GMT
	public function dateheure($choix = "" ) 
	{ 

		if(!$choix) $choix = 1;
		/*Echo "  Heure locale 1 : ".gmdate("l, d M Y H:i:s", time())." GMT";
		Echo " <br> Heure locale 2 : ".gmdate(" d M Y H:i:s", time())." GMT";
		Echo " <br> Heure locale 3 : ".gmdate(" d-m-Y H:i:s", time())." GMT";
		Echo " <br> Heure locale 4 : ".gmdate(" Y-m-d H:i:s", time());
		Echo " <br> Heure locale 5 : ".gmdate(" Y-m-d ", time());
		Echo " <br> Heure locale 6 : ".gmdate("H:i:s", time());*/
		switch(intval( $choix))
		{
			case 1: $dateheure= gmdate("Y-m-d H:i:s", time());//date & heure format anglais
			break;
			case 2: $dateheure= gmdate("d-m-Y H:i:s", time());//date & heure format francais
			break;
			case 3: $dateheure=  gmdate("Y-m-d", time()); // date format anglais
			break;
			case 4: $dateheure=  gmdate("d-m-Y", time()); // date format francais
			break;
			case 5: $dateheure= gmdate("H:i:s", time());//heure
			break;
			case 6: $dateheure= gmdate("d M Y H:i:s", time())." GMT"; //jour en lettre & date
			break;
			case 7: $dateheure= gmdate("H:i", time());//heure
			break;
			case 8: $dateheure= gmdate("YmdHis", time());//heure
			break;
		}
		return $dateheure;
	}

	public function date_fr($date) {
		if($date)
		{
			list($an,$mois,$j)= explode("-", $date);
			$datefr = $j."/".$mois."/".$an;
			return $datefr;
		}
	}

	public function date_jolie($date) {
		if($date)
		{
			list($an,$mois,$j)= explode("-", $date);
			switch(intval($mois)){
				case 1 : $ml = 'JAN’'; break;
				case 2 : $ml = 'FÉV’'; break;
				case 3 : $ml = 'MAR’'; break;
				case 4 : $ml = 'AVR’'; break;
				case 5 : $ml = 'MAI’'; break;
				case 6 : $ml = 'JUN’'; break;
				case 7 : $ml = 'JUI’'; break;
				case 8 : $ml = 'AOU’'; break;
				case 9 : $ml = 'SEP’'; break;
				case 10 : $ml = 'OCT’'; break;
				case 11 : $ml = 'NOV’'; break;
				case 12 : $ml = 'DÉC’'; break;
			}
			$data[0]=$j;
			$data[1]=$ml.substr($an,-2);
			return $data;
		}
	}

	public function generateNum($lenght = NULL)
    {
		if(!$lenght){$lenght = 10;}
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $lenght; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }

	public function generatePassword($lenght = NULL)
    {
		if(!$lenght){$lenght = 10;}
        $characters = '0123456789abcdefghijkmnopqrstuvwxyz(=+&-_~#{[/|\^@]})!?ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $lenght; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString ;
    }


	public function generateNumber($lenght = NULL)
    {	
		if(!$lenght){$lenght = 10;}
			$characters = '0123456789';
			$charactersLength = strlen($characters);
			$randomString = '';

		do{
			for ($i = 0; $i < $lenght; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			@$code = $this->get_field_by_id('app_rh_user','coderetrait','coderetrait',$randomString);
		}while(@$code);
		
        return $randomString;
    }

	function remove_accent($str)
	{
		$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
		$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
		return str_replace($a, $b, $str);
	}

	function post_slug($str)
	{
		$url = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
		array('', '-', ''), $this->remove_accent($str)));
		$url.='-camp'.rand();
		return $url;
	}

	function nom_pdf($str)
	{
		$url = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
		array('', '-', ''), $this->remove_accent($str)));
		//$url.='-camp'.rand();
		return $url;
	}
	

	function post_slug_actu($str)
	{
		$url = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
		array('', '-', ''), $this->remove_accent($str)));
		//$url.='-camp'.rand();
		return $url;
	}
	
	function post_slug_users($str)
	{
		$url = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
		array('', '-', ''), $this->remove_accent($str)));
		$url.='-profil'.rand();
		return $url;
	}

	function methode_MondialeSMS($tel,$sms){

		$param = array(
			'username' => 'INFO MECENE',
			'password' => '4Vn3CWQW',
			'sender' => 'INFO MECENE',
			'text' => $sms,
			'type' => 'text',
		);
		
		$num= substr($tel,-10);
		$to='+225'.$num;
		$recipients = array($to);
		$post = 'to=' . implode(';', $recipients);
		foreach ($param as $key => $val) {
			$post .= '&' . $key . '=' . rawurlencode($val);
		}
		$url = "https://africasmshub.mondialsms.net/api/api_http.php" ;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
		$result = curl_exec($ch);
		if(curl_errno($ch)) {
			$result = "cURL ERROR: " . curl_errno($ch) . " " . curl_error($ch);
		} else {
			$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
			switch($returnCode) {
				case 200 :
					$result = "message envoyé";
					break;
				default :
					$result = "HTTP ERROR: " . $returnCode;
			}
		}
		curl_close($ch);
		//return $result;
	}

	function methode_Infobip($tel,$sms){

		$num= substr($tel,-10);
		$to='225'.$num;

		$BASE_URL = "https://6jwrvz.api.infobip.com";
		$API_KEY = "7198b9a674439de66a2388dbb3c94a5f-0d1d17b9-f458-4a46-b6cf-7ed0b91c406b";

		$SENDER = "INFO MECENE";
		$RECIPIENT = $to;
		$MESSAGE_TEXT = $sms;
		
		$configuration = (new Configuration())
			->setHost($BASE_URL)
			->setApiKeyPrefix('Authorization', 'App')
			->setApiKey('Authorization', $API_KEY);
		
		$client = new Client();
		
		$sendSmsApi = new SendSMSApi($client, $configuration);
		$destination = (new SmsDestination())->setTo($RECIPIENT);
		$message = (new SmsTextualMessage())
			->setFrom($SENDER)
			->setText($MESSAGE_TEXT)
			->setDestinations([$destination]);
		
		$request = (new SmsAdvancedTextualRequest())->setMessages([$message]);
		
		try {
			$smsResponse = $sendSmsApi->sendSmsMessage($request);
			//return "Response body: " . $smsResponse;
		} catch (Throwable $apiException) {
			//return "HTTP Code: " . $apiException->getCode() . "\n";
		}


	}
	
	function envoyer_sms($tel,$sms)
	{
		
		$num= substr($tel,-10);
		
		if(substr($num,0,2) == '07' || substr($num,0,2) == 07){ //si c'est un numéro orange
			
			$this->methode_Infobip($tel,$sms);


		}else{	//si autre reseau
			
			$this->methode_MondialeSMS($tel,$sms);

		}
		
	}


	function solde_Mondial_SMS()
	{
		$param = array(
			'username' => 'INFO MECENE',
			'password' => '4Vn3CWQW'
		);
		
		$post = '';
		foreach ($param as $key => $val) {
			$post .= '&' . $key . '=' . rawurlencode($val);
		}
		$url = "http://smpp1.valorisetelecom.com/api/api_balance.php" ;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
		$result = curl_exec($ch);
		

		if($result>0){
			$solde = round(($result * 651) / 26 );
		}else{
			$solde = 0;
		}
		
	    return $solde;

		
	}

	
	function merge($nomImage) {

		$filename_im = storage_path('app/public/users/actualites/'.$nomImage); 
		$filename_stamp = storage_path('app/public/users/actualites/minicalque.png');
		$filename_result = storage_path('app/public/users/actualites/'.$nomImage);
	  
		$lowerFileName = strtolower($filename_im); 
		if(substr_count($lowerFileName, '.jpg')>0 || substr_count($lowerFileName, '.jpeg')>0){
		  $im = imagecreatefromjpeg($filename_im);    
		}else if(substr_count($lowerFileName, '.png')>0){
		  $im = imagecreatefrompng($filename_im); 
		}else if(substr_count($lowerFileName, '.gif')>0){
		  $im = imagecreatefromgif($filename_im); 
		}
	  
	  
		$lowerFileName = strtolower($filename_stamp); 
		if(substr_count($lowerFileName, '.jpg')>0 || substr_count($lowerFileName, '.jpeg')>0){
		  $stamp = imagecreatefromjpeg($filename_stamp);   
		}else if(substr_count($lowerFileName, '.png')>0){
		  $stamp = imagecreatefrompng($filename_stamp);   
		}else if(substr_count($lowerFileName, '.gif')>0){
		  $stamp = imagecreatefromgif($filename_stamp);   
		}
						  
	  
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);
	  
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
	  
		$lowerFileName = strtolower($filename_result); 
		if(substr_count($lowerFileName, '.jpg')>0 || substr_count($lowerFileName, '.jpeg')>0){
		  imagejpeg($im, $filename_result);
		}else if(substr_count($lowerFileName, '.png')>0){
		  imagepng($im, $filename_result);
		}else if(substr_count($lowerFileName, '.gif')>0){
		  imagegif($im, $filename_result); 
		}
	  
		// Clean up
		imagedestroy($im);
		imagedestroy($stamp);
	  
	}
	  
	public function hm($heure) {
		if($heure)
	    {
	        list($h,$m,$s)= explode(":", $heure);
	        $hm = $h.":".$m;
	        return $hm;
	    }
	}

	  
	public function user_photo_link($photo,$dossier) {
		
		$link = URL::to('/storage/app/public/users/'.$dossier.'/'.$photo);
		
		return $link;
	   
	}


	
	public function periode($date,$heure) 
	{ 
		$today = $this->dateheure(3);
		if($date == $today){
			$periode= 'Aujourd\'hui, '.$this->hm($heure);
		}else{
			list($an,$mois,$j)= explode("-", $date);
			switch($mois){
				case 1:case "1":case "01": $moi = 'Jan'; break;
				case 2:case "2":case "02": $moi = 'Fév'; break;
				case 3:case "3":case "03": $moi = 'Mars'; break;
				case 4:case "4":case "04": $moi = 'Avr'; break;
				case 5:case "5":case "05": $moi = 'Mai'; break;
				case 6:case "6":case "06": $moi = 'Juin'; break;
				case 7:case "7":case "07": $moi = 'Juil'; break;
				case 8:case "8":case "08": $moi = 'Août'; break;
				case 9:case "9":case "09": $moi = 'Sep'; break;
				case 10:case "10": $moi = 'Oct'; break;
				case 11:case "11": $moi = 'Nov'; break;
				case 12:case "12": $moi = 'Déc'; break;
			}

			if($an == date('Y')){
				$periode= $j.' '.$moi.', '.$this->hm($heure);
			}else{
				$periode= $this->datefr($date).', '.$this->hm($heure);
			}
		}
		
		return $periode;
	}

	
	public function periode2($date) 
	{ 
		$today = $this->dateheure(3);
		if($date == $today){
			$periode= 'Aujourd\'hui ';
		}else{
			list($an,$mois,$j)= explode("-", $date);
			switch($mois){
				case 1:case "1":case "01": $moi = 'Janvier'; break;
				case 2:case "2":case "02": $moi = 'Février'; break;
				case 3:case "3":case "03": $moi = 'Mars'; break;
				case 4:case "4":case "04": $moi = 'Avril'; break;
				case 5:case "5":case "05": $moi = 'Mai'; break;
				case 6:case "6":case "06": $moi = 'Juin'; break;
				case 7:case "7":case "07": $moi = 'Juillet'; break;
				case 8:case "8":case "08": $moi = 'Août'; break;
				case 9:case "9":case "09": $moi = 'Septempbre'; break;
				case 10:case "10": $moi = 'Octobre'; break;
				case 11:case "11": $moi = 'Novembre'; break;
				case 12:case "12": $moi = 'Décembre'; break;
			}

			if($an == date('Y')){
				$periode= $j.' '.$moi.' '.$an;
			}else{
				$periode= $this->datefr($date);
			}
		}
		
		return $periode;
	}



	function indicatifs()
	{
		$codes_telephoniques = array(
			"Etats Unis d'Amérique" => 1, 
			"Canada" => 1, 
			"Fédération russe" => 7, 
			"Kazakhstan" => 7, 
			"Ouzbekistan" => 7, 
			"Egypte" => 20, 
			"Afrique du Sud" => 27, 
			"Grèce" => 30, 
			"Pays-Bas" => 31, 
			"Belgique" => 32, 
			"France" => 33, 
			"Espagne" => 34, 
			"Hongrie" => 36, 
			"Italie" => 39, 
			"Vatican" => 39, 
			"Roumanie" => 40, 
			"Liechtenstein" => 41, 
			"Suisse" => 41, 
			"Autriche" => 43, 
			"Royaume-Uni" => 44, 
			"Danemark" => 45, 
			"Suède" => 46, 
			"Norvège" => 47, 
			"Pologne" => 48, 
			"Allemagne" => 49, 
			"Pérou" => 51, 
			"Mexique Centre" => 52, 
			"Cuba" => 53, 
			"Argentine" => 54, 
			"Brésil" => 55, 
			"Chili" => 56, 
			"Colombie" => 57, 
			"Vénézuela" => 58, 
			"Malaisie" => 60, 
			"Australie" => 61, 
			"Ile Christmas" => 61, 
			"Indonésie" => 62, 
			"Philippines" => 63, 
			"Nouvelle-Zélande" => 64, 
			"Singapour" => 65, 
			"Thaïlande" => 66, 
			"Japon" => 81, 
			"Corée du Sud" => 82, 
			"Viêt-Nam" => 84, 
			"Chine" => 86, 
			"Turquie" => 90, 
			"Inde" => 91, 
			"Pakistan" => 92, 
			"Afghanistan" => 93, 
			"Sri Lanka" => 94, 
			"Union Birmane" => 95, 
			"Iran" => 98, 
			"Maroc" => 212, 
			"Algérie" => 213, 
			"Tunisie" => 216, 
			"Libye" => 218, 
			"Gambie" => 220, 
			"Sénégal" => 221, 
			"Mauritanie" => 222, 
			"Mali" => 223, 
			"Guinée" => 224, 
			"Côte d'Ivoire" => 225, 
			"Burkina Faso" => 226, 
			"Niger" => 227, 
			"Togo" => 228, 
			"Bénin" => 229, 
			"Maurice" => 230, 
			"Libéria" => 231, 
			"Sierra Leone" => 232, 
			"Ghana" => 233, 
			"Nigeria" => 234, 
			"République du Tchad" => 235, 
			"République Centrafricaine" => 236, 
			"Cameroun" => 237, 
			"Cap-Vert" => 238, 
			"Sao Tomé-et-Principe" => 239, 
			"Guinée équatoriale" => 240, 
			"Gabon" => 241, 
			"Bahamas" => 242, 
			"Congo" => 242, 
			"Congo Zaïre (Rep. Dem.)" => 243, 
			"Angola" => 244, 
			"Guinée-Bissao" => 245, 
			"Barbade" => 246, 
			"Ascension" => 247, 
			"Seychelles" => 248, 
			"Soudan" => 249, 
			"Rwanda" => 250, 
			"Ethiopie" => 251, 
			"Somalie" => 252, 
			"Djibouti" => 253, 
			"Kenya" => 254, 
			"Tanzanie" => 255, 
			"Ouganda" => 256, 
			"Burundi" => 257, 
			"Mozambique" => 258, 
			"Zambie" => 260, 
			"Madagascar" => 261, 
			"Réunion" => 262, 
			"Zimbabwe" => 263, 
			"Namibie" => 264, 
			"Malawi" => 265, 
			"Lesotho" => 266, 
			"Botswana" => 267, 
			"Antigua-et-Barbuda" => 268, 
			"Swaziland" => 268, 
			"Mayotte" => 269, 
			"République comorienne" => 269, 
			"Saint Hélène" => 290, 
			"Erythrée" => 291, 
			"Aruba" => 297, 
			"Ile Feroe" => 298, 
			"Groà«nland" => 299, 
			"Iles vierges américaines" => 340, 
			"Iles Caïmans" => 345, 
			"Espagne" => 349, 
			"Gibraltar" => 350, 
			"Portugal" => 351, 
			"Luxembourg" => 352, 
			"Irlande" => 353, 
			"Islande" => 354, 
			"Albanie" => 355, 
			"Malte" => 356, 
			"Chypre" => 357, 
			"Finlande" => 358, 
			"Bulgarie" => 359, 
			"Lituanie" => 370, 
			"Lettonie" => 371, 
			"Estonie" => 372, 
			"Moldavie" => 373, 
			"Arménie" => 374, 
			"Biélorussie" => 375, 
			"Andorre" => 376, 
			"Monaco" => 377, 
			"Saint-Marin" => 378, 
			"Ukraine" => 380, 
			"Yougoslavie" => 381, 
			"Croatie" => 385, 
			"Slovénie" => 386, 
			"Bosnie-Herzégovine" => 387, 
			"Macédoine" => 389, 
			"Italie" => 390, 
			"République Tchèque" => 420, 
			"Slovaquie" => 421, 
			"Liechtenstein" => 423, 
			"Bermudes" => 441, 
			"Grenade" => 473, 
			"Iles Falklands" => 500, 
			"Belize" => 501, 
			"Guatemala" => 502, 
			"Salvador" => 503, 
			"Honduras" => 504, 
			"Nicaragua" => 505, 
			"Costa Rica" => 506, 
			"Panama" => 507, 
			"Haïti" => 509, 
			"Guadeloupe" => 590, 
			"Bolivie" => 591, 
			"Guyane" => 592, 
			"Equateur" => 593, 
			"Guinée Française" => 594, 
			"Paraguay" => 595, 
			"Antilles Françaises" => 596, 
			"Suriname" => 597, 
			"Uruguay" => 598, 
			"Antilles hollandaise" => 599, 
			"Saint Eustache" => 599, 
			"Saint Martin" => 599, 
			"Turks et caicos" => 649, 
			"Monteserrat" => 664, 
			"Saipan" => 670, 
			"Guam" => 671, 
			"Antarctique-Casey" => 672, 
			"Antarctique-Scott" => 672, 
			"Ile de Norfolk" => 672, 
			"Brunei Darussalam" => 673, 
			"Nauru" => 674, 
			"Papouasie - Nouvelle Guinée" => 675, 
			"Tonga" => 676, 
			"Iles Salomon" => 677, 
			"Vanuatu" => 678, 
			"Fidji" => 679, 
			"Palau" => 680, 
			"Wallis et Futuna" => 681, 
			"Iles Cook" => 682, 
			"Niue" => 683, 
			"Samoa Américaines" => 684, 
			"Samoa occidentales" => 685, 
			"Kiribati" => 686, 
			"Nouvelle-Calédonie" => 687, 
			"Tuvalu" => 688, 
			"Polynésie Française" => 689, 
			"Tokelau" => 690, 
			"Micronésie" => 691, 
			"Marshall" => 692, 
			"Sainte-Lucie" => 758, 
			"Dominique" => 767, 
			"Porto Rico" => 787, 
			"République Dominicaine" => 809, 
			"Saint-Vincent-et-les Grenadines" => 809, 
			"Corée du Nord" => 850, 
			"Hong Kong" => 852, 
			"Macao" => 853, 
			"Cambodge" => 855, 
			"Laos" => 856, 
			"Trinité-et-Tobago" => 868, 
			"Saint-Christophe-et-Niévès" => 869, 
			"Atlantique Est" => 871, 
			"Marisat (Atlantique Est)" => 872, 
			"Marisat (Atlantique Ouest)" => 873, 
			"Atlantique Ouest" => 874, 
			"Jamaïque" => 876, 
			"Bangladesh" => 880, 
			"Taiwan" => 886, 
			"Maldives" => 960, 
			"Liban" => 961, 
			"Jordanie" => 962, 
			"Syrie" => 963, 
			"Iraq" => 964, 
			"Koweït" => 965, 
			"Arabie saoudite" => 966, 
			"Yémen" => 967, 
			"Oman" => 968, 
			"Palestine" => 970, 
			"Emirats arabes unis" => 971, 
			"Israà«l" => 972, 
			"Bahreïn" => 973, 
			"Qatar" => 974, 
			"Bhoutan" => 975, 
			"Mongolie" => 976, 
			"Népal" => 977, 
			"Tadjikistan (Rep. du)" => 992, 
			"Turkménistan" => 993, 
			"Azerbaïdjan" => 994, 
			"Géorgie" => 995, 
			"Kirghizistan" => 996, 
			"Bahamas" => 1242, 
			"Barbade" => 1246, 
			"Anguilla" => 1264, 
			"Antigua et Barbuda " => 1268, 
			"Vierges Britanniques (Iles)" => 1284, 
			"Vierges Américaines (Iles)" => 1340, 
			"Cayman (Iles)" => 1345, 
			"Bermudes" => 1441, 
			"Grenade" => 1473, 
			"Turks et Caïcos (Iles)" => 1649, 
			"Montserrat" => 1664, 
			"Sainte-Lucie" => 1758, 
			"Dominique" => 1767, 
			"Saint-Vincent-et-Grenadines" => 1784, 
			"Porto Rico" => 1787, 
			"Hawaï" => 1808, 
			"Dominicaine (Rep.)" => 1809, 
			"Saint-Vincent-et-Grenadines" => 1809, 
			"Trinité-et-Tobago" => 1868, 
			"Saint-Kitts-et-Nevis" => 1869, 
			"Jamaïque" => 1876, 
			"Norfolk (Ile)" => 6723 
		); 
		return $codes_telephoniques;
	}
	


}
