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

  /* ****************************Includes********************************* */
  require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

  class domogeek extends eqLogic {
    /* **************************Attributs****************************** */

    /* ************************Methode static*************************** */

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

    /* **********************Methode d'instance************************* */

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
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ferie');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Week-End', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('weekend');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vacances scolaires', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vacances_scolaires');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Durée jour', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('duree_jour');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Durée jour Scenario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('numeric');
      $domogeekCmd->setIsHistorized(1);
      $domogeekCmd->setLogicalId('duree_jour_raw');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Lever du soleil', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('sunrise');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Zenith', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('zenith');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Coucher du soleil', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('sunset');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Lever du soleil scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
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
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setIsVisible(0);
      $domogeekCmd->setLogicalId('sunset_raw');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Jour Tempo EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('tempo_today');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Demain Tempo EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('tempo_tomorrow');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Jour EJP EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ejp_today');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Demain EJP EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ejp_tomorrow');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Saison', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('season');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Saint du jour', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('feastedsaint');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Saint de demain', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('feastedsaint_tomorrow');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance inondation', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_inondation');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance orage', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_orage');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance météo', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_meteo');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Type de vigilance', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_type');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Jour EcoWatt EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ecowatt_today');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Demain EcoWatt EDF', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ecowatt_tomorrow');
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
      log::add('domogeek', 'info', "Refreshing data ($url)", 'config');
      if ($url=="") {
        log::add('domogeek', 'error', "The URL cannot be empty");
        return;
      }
      if (!in_array($this->getConfiguration('zone_scolaire'), array('A','B','C'))) {
        log::add('domogeek', 'info', "The 'zone scolaire' is not defined (A, B or C)");
        } else {
          $jsontxt=file_get_contents($url."/holidayall/".$this->getConfiguration('zone_scolaire')."/now",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          if ($jsontxt!==false) $holidayall=json_decode($jsontxt,true);
            else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/holidayall)");
          if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());
      }
      if ($this->getConfiguration('ville')=="") {
        log::add('domogeek', 'info', "The city is not defined");
        } else {
          $jsontxt=file_get_contents($url."/sun/".$this->getConfiguration('ville')."/all/now",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          if ($jsontxt!==false) $sun=json_decode($jsontxt,true);
            else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/sun)");
          if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());
      }
      $jsontxt=file_get_contents($url."/ejpedf/now/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $ejp=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/ejpedf)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/ejpedf/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $ejp_tomorrow=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/ejpedf)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/season/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $season=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/season)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/feastedsaint/now/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $feastedsaint=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/feastedsaint)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/feastedsaint/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $feastedsaint_tomorrow=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/feastedsaint)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/tempoedf/now/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $tempo=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/tempoedf)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/tempoedf/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $tempo_tomorrow=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/tempoedf)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      if (!is_numeric($this->getConfiguration('departement')) || strlen($this->getConfiguration('departement'))<>2) {
        log::add('domogeek', 'info', "The 'département' should have 2 digits");
        } else {
          $jsontxt=file_get_contents($url."/vigilance/".$this->getConfiguration('departement')."/all",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
          if ($jsontxt!==false) $vigilance=json_decode($jsontxt,true);
            else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/vigilance)");
          if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());
      }

      $jsontxt=file_get_contents($url."/ecowattedf/now/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $ecowatt=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/ecowattedf)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      $jsontxt=file_get_contents($url."/ecowattedf/tomorrow/json",false,stream_context_create(array('http' => array('user_agent' => 'jeedom'))));
      if ($jsontxt!==false) $ecowatt_tomorrow=json_decode($jsontxt,true);
        else log::add('domogeek', 'error', "Cannot get data from API DOMOGEEK (/ecowattedf)");
      if (json_last_error()!=JSON_ERROR_NONE) log::add('domogeek', 'error', "Cannot decode '".$jsontxt."': ".json_last_error_msg());

      foreach ($this->getCmd() as $cmd) {
        $logicalId = $cmd->getLogicalId();
        if ($logicalId == '') $logicalId = $cmd->getConfiguration('data'); //compatibility
        if ($logicalId=="ferie") {
          if (isset($holidayall['holiday'])) {
            if ($holidayall['holiday']=="False") {
              $cmd->event("Non");
            } else {
              $cmd->event($holidayall['holiday']);
            }
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="weekend") {
          if (isset($holidayall['weekend'])) {
            if ($holidayall['weekend']=="False") {
              $cmd->event("Non");
            } elseif ($holidayall['weekend']=="True") {
              $cmd->event("Oui");
            } else {
              $cmd->event($holidayall['weekend']);
            }
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="vacances_scolaires") {
          if (isset($holidayall['schoolholiday'])) {
            if ($holidayall['schoolholiday']=="False"){
              $cmd->event("Non");
            } else {
              $cmd->event($holidayall['schoolholiday']);
            }
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="duree_jour") {
          if (isset($sun['dayduration'])) $cmd->event($sun['dayduration']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="duree_jour_raw") {
          if (isset($sun['dayduration'])) {
            $duration=intval(substr($sun['dayduration'],0,strpos($sun['dayduration'],":")-2))*60 + intval(substr($sun['dayduration'],strpos($sun['dayduration'],":")+1));
            $cmd->event($duration);
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="sunset") {
          if (isset($sun['sunset'])) $cmd->event($sun['sunset']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="zenith") {
          if (isset($sun['zenith'])) $cmd->event($sun['zenith']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="sunrise") {
          if (isset($sun['sunrise'])) $cmd->event($sun['sunrise']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="sunset_raw") {
          if (isset($sun['sunset'])) $cmd->event(str_replace(':', '', $sun['sunset']));
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="zenith_raw") {
          if (isset($sun['zenith'])) $cmd->event(str_replace(':', '', $sun['zenith']));
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="sunrise_raw") {
          if (isset($sun['sunrise'])) $cmd->event(str_replace(':', '', $sun['sunrise']));
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="ejp_today") {
          if (isset($ejp['ejp'])) {
            if($ejp['ejp']=="False"){
              $cmd->event("Non");
            } elseif ($ejp['ejp']=="True") {
              $cmd->event("Oui");
            } else {
              $cmd->event($ejp['ejp']);
            }
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="ejp_tomorrow") {
          if (isset($ejp_tomorrow['ejp'])) {
            if ($ejp_tomorrow['ejp']=="False"){
              $cmd->event("Non");
            } elseif ($ejp_tomorrow['ejp']=="True") {
              $cmd->event("Oui");
            } else {
              $cmd->event($ejp_tomorrow['ejp']);
            }
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="season") {
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
          } //else $cmd->event('Non défini');
        } elseif ($logicalId=="feastedsaint"){
          if (isset($feastedsaint['feastedsaint'])) $cmd->event($feastedsaint['feastedsaint']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="feastedsaint_tomorrow"){
          if (isset($feastedsaint_tomorrow['feastedsaint'])) $cmd->event($feastedsaint_tomorrow['feastedsaint']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="tempo_today"){
          if (isset($tempo['tempocolor'])) $cmd->event($tempo['tempocolor']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="tempo_tomorrow"){
          if (isset($tempo_tomorrow['tempocolor'])) $cmd->event($tempo_tomorrow['tempocolor']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="vigilance_inondation"){
          if (isset($vigilance['vigilanceflood'])) $cmd->event($vigilance['vigilanceflood']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="vigilance_orage"){
          if (isset($vigilance['vigilancestorm'])) $cmd->event($vigilance['vigilancestorm']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="vigilance_meteo"){
          if (isset($vigilance['vigilancecolor'])) $cmd->event($vigilance['vigilancecolor']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="vigilance_type"){
          if (isset($vigilance['vigilancerisk'])) $cmd->event($vigilance['vigilancerisk']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="ecowatt_today"){
          if (isset($ecowatt['color'])) $cmd->event($ecowatt['color']);
            //else $cmd->event('Non défini');
        } elseif ($logicalId=="ecowatt_tomorrow"){
          if (isset($ecowatt_tomorrow['color'])) $cmd->event($ecowatt_tomorrow['color']);
            //else $cmd->event('Non défini');
        }
      }
      return ;
    }

     /* ***********************Getteur Setteur*************************** */

  }

  class domogeekCmd extends cmd {
    /* **************************Attributs****************************** */


    /* ************************Methode static*************************** */

    /* **********************Methode d'instance************************* */
    public function execute($_options = array()) {
      $domogeek=$this->getEqLogic();
      $url=$domogeek->getConfiguration('url');
      if ($url=="") {
        log::add('domogeek', 'error', "The URL cannot be empty");
        return;
      }
      switch ($this->getLogicalId()) {
        case 'refresh':
          $domogeek->getInformations();
          break;
        default:
          log::add('domogeek', 'warning', 'Unknown command: ' . $this->getLogicalId());
      }
      return false;
    }
  }

?>
