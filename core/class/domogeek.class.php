<?php
  
  /* This file is part of Jeedom.
    *
    * Jeedom is free software: you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
    *
    * Jeedom is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    * GNU General Public License for more details.
    *
    * You should have received a copy of the GNU General Public License
    * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
  */
  
  /* * ***************************Includes********************************* */
  require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
  
  class domogeek extends eqLogic {
    /*     * *************************Attributs****************************** */
    
    
    /*     * ***********************Methode static*************************** */
    
   /*
  public static function cron() {
  }
  */

  /*     
  public static function cron5() {
  }
  */

  /*
	public static function cron15() {
	}
  */

  /*
  public static function cronHourly() {
  }
  */

  /*
  public static function cronDaily() {
  }  
  */
 
 
    public static function pull() {
      foreach (eqLogic::byType('domogeek') as $domogeek) {
        $domogeek->getInformations();
      }
      
    }
    
    
    /*     * *********************Methode d'instance************************* */

  /*
    public function preInsert() {
  	}
  */

    public function postInsert() {
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Rafraichir', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setType('action');
      $domogeekCmd->setSubType('other');
      $domogeekCmd->setLogicalId('refresh');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Férié', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'ferie');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ferie');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Week-End', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'weekend');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('weekend');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vacances scolaires', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'vacances_scolaires');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vacances_scolaires');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Durée jour', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'duree_jour');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(1);
      $domogeekCmd->setLogicalId('duree_jour');
      $domogeekCmd->save();        
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Lever du soleil', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'sunrise');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('sunrise');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Zenith', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'zenith');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('zenith');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Coucher du soleil', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'sunset');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('sunset');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Lever du soleil scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'sunrise_raw');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setIsVisible(0);
      $domogeekCmd->setLogicalId('sunrise_raw');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Zenith scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'zenith_raw');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setIsVisible(0);
      $domogeekCmd->setLogicalId('zenith_raw');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Coucher du soleil scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'sunset_raw');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setIsVisible(0);
      $domogeekCmd->setLogicalId('sunset_raw');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('IP Publique', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'ip_publique');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ip_publique');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Jour Tempo EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'tempo_today');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('tempo_today');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Demain Tempo EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'tempo_tomorrow');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('tempo_tomorrow');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Jour EJP EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'ejp_today');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ejp_today');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Demain EJP EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'ejp_tomorrow');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ejp_tomorrow');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Saison', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'season');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('season');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Saint du jour', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'feastedsaint');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('feastedsaint');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Saint de demain', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'feastedsaint_tomorrow');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('feastedsaint_tomorrow');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance inondation', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'vigilance_inondation');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_inondation');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance météo', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'vigilance_meteo');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_meteo');
      $domogeekCmd->save();
      
      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Type de vigilance', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setConfiguration('data', 'vigilance_type');
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_type');
      $domogeekCmd->save();
      
    }
   
    public function preUpdate() {
      if ($this->getConfiguration('url')=="") {
        throw new Exception(__("L'URL ne peut-être vide", __FILE__));
      }
    }
  
  /*
  public function postUpdate() {
  
  }
  */
    
  
  /*  
  public function preRemove() {
        
  }
  */

  /*
  public function postRemove() {
        
  } 
  */

  /*
  public function preSave() {
        
  }
  */  
	
  /*
	public function postSave() {
  
  }
  */
  
    public function getInformations() {
      $url=$this->getConfiguration('url');
      log::add('domogeek', 'info', "Récupération des données ($url)", 'config');
      
      if ($url=="") {
        log::add('domogeek', 'error', "L'URL ne peut-être vide");
        return;
      }
      
      if (!in_array($this->getConfiguration('zone_scolaire'), array('A','B','C'))) {
        log::add('domogeek', 'info', "La zone scolaire n'est pas définie (A, B ou C)");
        } else {
          $jsontxt=file_get_contents($url."/holidayall/".$this->getConfiguration('zone_scolaire')."/now",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          $holidayall=json_decode($jsontxt,true);  
      }
      if ($this->getConfiguration('ville')=="") {
        log::add('domogeek', 'info', "La ville n'est pas définie");
        } else {
          $jsontxt=file_get_contents($url."/sun/".$this->getConfiguration('ville')."/all/now",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          $sun=json_decode($jsontxt,true);  
      }
      if (!in_array($this->getConfiguration('zone_ejp'), array('nord','sud','ouest','paca'))) {
        log::add('domogeek', 'info', "La zone EJP n'est pas définie");
        } else {
          $jsontxt=file_get_contents($url."/ejpedf/".$this->getConfiguration('zone_ejp')."/today/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          $ejp=json_decode($jsontxt,true);
          
          $jsontxt=file_get_contents($url."/ejpedf/".$this->getConfiguration('zone_ejp')."/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          $ejp_tomorrow=json_decode($jsontxt,true);  
      }
      
      $jsontxt=file_get_contents($url."/season/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      $season=json_decode($jsontxt,true);
      
      $jsontxt=file_get_contents($url."/feastedsaint/now/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      $feastedsaint=json_decode($jsontxt,true);
      
      $jsontxt=file_get_contents($url."/feastedsaint/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      $feastedsaint_tomorrow=json_decode($jsontxt,true);
      
      $jsontxt=file_get_contents($url."/myip/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      $ip_publique=json_decode($jsontxt,true);
      
      $jsontxt=file_get_contents($url."/tempoedf/now/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      $tempo=json_decode($jsontxt,true);
      
      $jsontxt=file_get_contents($url."/tempoedf/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      $tempo_tomorrow=json_decode($jsontxt,true);
      
      if (!is_numeric($this->getConfiguration('departement')) || strlen($this->getConfiguration('departement'))<>2) {
        log::add('domogeek', 'info', 'Le département doit être 2 chiffres');
        } else {
          $jsontxt=file_get_contents($url."/vigilance/".$this->getConfiguration('departement',false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))))."/all");
          $vigilance=json_decode($jsontxt,true);  
      }
      
      foreach ($this->getCmd() as $cmd) {
        if ($cmd->getConfiguration('data')=="ferie") {
          if (isset($holidayall['holiday'])) {
            if ($holidayall['holiday']=="False") {
              $cmd->event("Non");
            } else {
              $cmd->event($holidayall['holiday']);
            }
          } else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="weekend") {
          if (isset($holidayall['weekend'])) {
            if ($holidayall['weekend']=="False") {
              $cmd->event("Non");
            } elseif ($holidayall['weekend']=="True") {
              $cmd->event("Oui");
            } else {
              $cmd->event($holidayall['weekend']);
            }
          } else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="vacances_scolaires") {
          if (isset($holidayall['schoolholiday'])) {
            if ($holidayall['schoolholiday']=="False"){
              $cmd->event("Non");
            } else {
              $cmd->event($holidayall['schoolholiday']);
            }
          } else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="duree_jour") {
          if (isset($sun['dayduration'])) $cmd->event($sun['dayduration']);
            else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="sunset") {
          if (isset($sun['sunset'])) $cmd->event($sun['sunset']);
            else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="zenith") {
          if (isset($sun['zenith'])) $cmd->event($sun['zenith']);
            else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="sunrise") {
          if (isset($sun['sunrise'])) $cmd->event($sun['sunrise']);
            else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="sunset_raw") {
          if (isset($sun['sunset'])) $cmd->event(str_replace(':', '', $sun['sunset']));
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="zenith_raw") {
          if (isset($sun['zenith'])) $cmd->event(str_replace(':', '', $sun['zenith']));
            else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="sunrise_raw") {
          if (isset($sun['sunrise'])) $cmd->event(str_replace(':', '', $sun['sunrise']));
            else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="ejp_today") {
          if (isset($ejp['ejp'])) {
            if($ejp['ejp']=="False"){
              $cmd->event("Non");
            } elseif ($ejp['ejp']=="True") {
              $cmd->event("Oui");
            } else {
              $cmd->event($ejp['ejp']);
            }
          } else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="ejp_tomorrow") {
          if (isset($ejp_tomorrow['ejp'])) {
            if ($ejp_tomorrow['ejp']=="False"){
              $cmd->event("Non");
            } elseif ($ejp_tomorrow['ejp']=="True") {
              $cmd->event("Oui");
            } else {
              $cmd->event($ejp_tomorrow['ejp']);
            }
          } else $cmd->event('Non défini');
        } elseif ($cmd->getConfiguration('data')=="season") {
          if (isset($season['season'])) {
            if ($season['season']=="winter"){
              $cmd->event("hiver");
            } elseif ($season['season']=="spring")  {
              $cmd->event("printemps");
            } elseif  ($season['season']=="summer") {
              $cmd->event("été");
            } elseif  ($season['season']=="fall" || $season['season']=="autumn")  {
              $cmd->event("automne");
            } else {
              $cmd->event($season['season']);
            }
          } else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="ip_publique"){
          if (isset($ip_publique['myip'])) $cmd->event($ip_publique['myip']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="feastedsaint"){
          if (isset($feastedsaint['feastedsaint'])) $cmd->event($feastedsaint['feastedsaint']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="feastedsaint_tomorrow"){
          if (isset($feastedsaint_tomorrow['feastedsaint'])) $cmd->event($feastedsaint_tomorrow['feastedsaint']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="tempo_today"){
          if (isset($tempo['tempocolor'])) $cmd->event($tempo['tempocolor']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="tempo_tomorrow"){
          if (isset($tempo_tomorrow['tempocolor'])) $cmd->event($tempo_tomorrow['tempocolor']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="vigilance_inondation"){
          if (isset($vigilance['vigilanceflood'])) $cmd->event($vigilance['vigilanceflood']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="vigilance_meteo"){
          if (isset($vigilance['vigilancecolor'])) $cmd->event($vigilance['vigilancecolor']);
            else $cmd->event('Non défini');
        } elseif($cmd->getConfiguration('data')=="vigilance_type"){
          if (isset($vigilance['vigilancerisk'])) $cmd->event($vigilance['vigilancerisk']);
            else $cmd->event('Non défini');
        }
      }
      return ;
    }
    
     /*     * **********************Getteur Setteur*************************** */   
    
  }
  
  class domogeekCmd extends cmd {
    /*     * *************************Attributs****************************** */
    
    
    /*     * ***********************Methode static*************************** */
    
    /*     * *********************Methode d'instance************************* */
    public function execute($_options = array()) {
      $domogeek=$this->getEqLogic();
      $url=$domogeek->getConfiguration('url');
      if ($url=="") {
        log::add('domogeek', 'error', "L'URL ne peut-être vide");
        return;
      }
      switch ($this->getLogicalId()) {
        case 'refresh':
          $domogeek->getInformations();
          break;
        default:
          log::add('domogeek', 'warning', 'Commande inconnue : ' . $this->getLogicalId());
      }
      return false;
    }
  }
  
?>
