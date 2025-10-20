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
  include_file('core', 'domogeek', 'config', 'domogeek');

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
        log::add('domogeek', 'debug', "Execute getInformations() from pull method");
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
      $domogeekCmd->setName(__('Férié scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('binary');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ferie_raw');
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
      $domogeekCmd->setName(__('Week-End scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('binary');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('weekend_raw');
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
      $domogeekCmd->setName(__('Vacances scolaires scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('binary');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vacances_scolaires_raw');
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
      $domogeekCmd->setName(__('Durée jour scénario', __FILE__));
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
      $domogeekCmd->setName(__('Jour EJP EDF scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ejp_today_raw');
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
      $domogeekCmd->setName(__('Demain EJP EDF scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ejp_tomorrow_raw');
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
      $domogeekCmd->setName(__('Fête du jour', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('feastedsaint');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Fête de demain', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('feastedsaint_tomorrow');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance Crues', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_crues');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance Orages', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_orages');
      $domogeekCmd->save();

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Vigilance', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('string');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('vigilance_overall');
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
      $domogeekCmd->setName(__('Jour EcoWatt EDF scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('numeric');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ecowatt_today_raw');
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

      $domogeekCmd = new domogeekCmd();
      $domogeekCmd->setName(__('Demain EcoWatt EDF scénario', __FILE__));
      $domogeekCmd->setEqLogic_id($this->id);
      $domogeekCmd->setUnite('');
      $domogeekCmd->setType('info');
      $domogeekCmd->setSubType('numeric');
      $domogeekCmd->setIsHistorized(0);
      $domogeekCmd->setLogicalId('ecowatt_tomorrow_raw');
      $domogeekCmd->save();

    }

  /*
    public function preUpdate() {
    }
  */

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

    private static function getInformationZoneScolaire(string $zone, $departement = "") {
    
      function extract_vevent_blocks(array $lines) {
        $events = [];
        $inEvent = false;
        $current = [];

        foreach ($lines as $line) {
          if (strpos($line, 'BEGIN:VEVENT') === 0) {
            $inEvent = true;
            $current = [];
            continue;
          }
          if (strpos($line, 'END:VEVENT') === 0) {
            if (isset($current['DTSTART'], $current['DTEND'])) {
              $events[] = $current;
            }
            $inEvent = false;
            continue;
          }
          if ($inEvent) {
            if (strpos($line, 'DTSTART') === 0) {
              $current['DTSTART'] = $line;
              //convert to DateTime
              preg_match('/:(\d{8})/', $line, $match);
              if (!empty($match[1])) {
                $date = DateTime::createFromFormat('Ymd', $match[1]);
                if ($date !== false) {
                  $date->setTime(0,0);
                  $current['start']=$date;
                }
              }
            } elseif (strpos($line, 'DTEND') === 0) {
              $current['DTEND'] = $line;
              //convert to DateTime
              preg_match('/:(\d{8})/', $line, $match);
              if (!empty($match[1])) {
                $date = DateTime::createFromFormat('Ymd', $match[1]);
                if ($date !== false) {
                  $date->setTime(0,0);
                  $current['end']=$date;
                }
              }
            } elseif (strpos($line, 'SUMMARY') === 0) {
              $current['SUMMARY'] = $line;
              $current['description']=substr($line, 8);
            }
          }
        }
        return $events;
      }

     function getZoneFromDepartement($departement):string {
       $zonesScolaires = array(
         1  => "A",
         2  => "B",
         3  => "A",
         4  => "B",
         5  => "B",
         6  => "B",
         7  => "A",
         8  => "B",
         9  => "C",
         10 => "B",
         11 => "C",
         12 => "C",
         13 => "B",
         14 => "B",
         15 => "A",
         16 => "A",
         17 => "A",
         18 => "B",
         19 => "A",
        "2A" => "Corse",
        "2B" => "Corse",
         20 => "Corse",
         21 => "A",
         22 => "B",
         23 => "A",
         24 => "A",
         25 => "A",
         26 => "A",
         27 => "B",
         28 => "B",
         29 => "B",
         30 => "C",
         31 => "C",
         32 => "C",
         33 => "A",
         34 => "C",
         35 => "B",
         36 => "B",
         37 => "B",
         38 => "A",
         39 => "A",
         40 => "A",
         41 => "B",
         42 => "A",
         43 => "A",
         44 => "B",
         45 => "B",
         46 => "C",
         47 => "A",
         48 => "C",
         49 => "B",
         50 => "B",
         51 => "B",
         52 => "B",
         53 => "B",
         54 => "B",
         55 => "B",
         56 => "B",
         57 => "B",
         58 => "A",
         59 => "B",
         60 => "B",
         61 => "B",
         62 => "B",
         63 => "A",
         64 => "A",
         65 => "C",
         66 => "C",
         67 => "B",
         68 => "B",
         69 => "A",
         70 => "A",
         71 => "A",
         72 => "B",
         73 => "A",
         74 => "A",
         75 => "C",
         76 => "B",
         77 => "C",
         78 => "C",
         79 => "A",
         80 => "B",
         81 => "C",
         82 => "C",
         83 => "B",
         84 => "B",
         85 => "B",
         86 => "A",
         87 => "A",
         88 => "B",
         89 => "A",
         90 => "A",
         91 => "C",
         92 => "C",
         93 => "C",
         94 => "C",
         95 => "C",
         971 => "Guadeloupe",
         972 => "Martinique",
         973 => "Guyane",
         974 => "Reunion",
         976 => "Mayotte"
        );
       $deptKey=intval($departement);
       if ($deptKey == 0 && ($departement == "2A" || $departement == "2B")) $deptKey=$departement;
       if ($deptKey == 0) {
         log::add('domogeek', 'error', "Cannot convert departement '" . $departement . "' to get the Zone Scolaire", 'config');
         return "None";
       }
       if (isset($zonesScolaires[$deptKey])) {
         return $zonesScolaires[$deptKey];
       }
       return "None";
     }

      //See https://www.data.gouv.fr/datasets/le-calendrier-scolaire/
      if ($zone=="Auto") {
        $zone = getZoneFromDepartement($departement);
      }
      if (in_array($zone, array('A','B','C'))) {
        $url = "https://fr.ftp.opendatasoft.com/openscol/fr-en-calendrier-scolaire/Zone-%zone%.ics";
        $url = str_replace("%zone%", $zone, $url);
      } elseif ($zone == "Corse") {
        $url = "https://fr.ftp.opendatasoft.com/openscol/fr-en-calendrier-scolaire/Corse.ics";
      } else {
        //other is not supported
        return false;
      }
      log::add('domogeek', 'info', "Retrieve school holiday data from '" . $url . "'");
      try {
        $icsContent = file_get_contents($url);
        if ($icsContent === FALSE) {
          return false;
        }
      } catch (Exception $e) {
        return false;
      }
      $icsContent = preg_replace("/\r\n[ \t]/", '', $icsContent); // Unfold lines
      $icsContent = str_replace(["\r\n", "\r"], "\n", $icsContent); // Normalize line endings
      $events = extract_vevent_blocks(array_filter(array_map('trim', explode("\n", $icsContent))));
      $today = new DateTime();

      $found=false;
      $description="";
      foreach ($events as $event) {
        if (isset($event['start']) && isset($event['end'])) {
          if ($event['start']<=$today && $today<$event['end']) {
            $found=true;
            if (isset($event['description'])) {
              $description = $event['description'];
            }
            break;
          }
        }
      }
      log::add('domogeek', 'info', "school holiday data: '".($found ? "True" : "False")."', '" . $description . "'");
      return array("raw"=> $found, "description" => $description);
    }

    private static function getInformationFerie(bool $alsaceMoselle = false): array {

      function datePaques(int $an): DateTime {
        $a = intdiv($an, 100);
        $b = $an % 100;
        $c = intdiv(3*($a+25), 4);
        $d = (3*($a+25)) % 4;
        $e = intdiv(8*($a+11), 25);
        $f = (5*$a+$b) % 19;
        $g = (19*$f+$c-$e) % 30;
        $h = intdiv($f+11*$g, 319);
        $j = intdiv(60*(5-$d)+$b, 4);
        $k = (60*(5-$d)+$b) % 4;
        $m = (2*$j-$k-$g+$h) % 7;
        $n = intdiv($g-$h+$m+114, 31);
        $p = ($g-$h+$m+114) % 31;

        $jour = $p+1;
        $mois = $n;

        $date = new DateTime();
        $date -> setDate($an, $mois, $jour);
        $date -> setTime(0,0);
        return $date;
      }

      log::add('domogeek', 'info', "Retrieve public holiday data");
      $today = new DateTime();

      $an = $today->format("Y");
      $dp = datePaques($an);

      $events = array();

      // Jour de l'an
      $date = DateTime::createFromFormat("Y-m-d", $an."-01-01");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Jour de l'an");

      if ($alsaceMoselle) {
        // Vendredi saint (pour l'Alsace-Moselle)
        $date = clone $dp;
        $date -> modify('-2 day');
        $events[]=array("date" => $date, "description" => "Vendredi Saint");
      }

      // Dimanche de Pâques
      $date = clone $dp;
      $events[]=array("date" => $date, "description" => "Dimanche de Pâques");

      // Lundi de Pâques
      $date = clone $dp;
      $date -> modify('+1 day');
      $events[]=array("date" => $date, "description" => "Lundi de Pâques");

      // Fête du travail
      $date = DateTime::createFromFormat("Y-m-d", $an."-05-01");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Fête du travail");

      // Victoire des alliés 1945
      $date = DateTime::createFromFormat("Y-m-d", $an."-05-08");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Victoire des alliés 1945");

      // Jeudi de l'Ascension
      $date = clone $dp;
      $date -> modify('+39 day');
      $events[]=array("date" => $date, "description" => "Jeudi de l'Ascension");

      // Dimanche de Pentecôte
      $date = clone $dp;
      $date -> modify('+49 day');
      $events[]=array("date" => $date, "description" => "Dimanche de Pentecôte");

      // Lundi de Pentecôte
      /*
        $date = clone $dp;
        $date -> modify('+50 day');
        $events[]=array("date" => $date, "description" => "Lundi de Pentecôte");
        */

      // Fête Nationale
      $date = DateTime::createFromFormat("Y-m-d", $an."-07-14");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Fête Nationale");

      // Assomption
      $date = DateTime::createFromFormat("Y-m-d", $an."-08-15");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Assomption");

      // Toussaint
      $date = DateTime::createFromFormat("Y-m-d", $an."-11-01");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Toussaint");

      // Armistice 1918
      $date = DateTime::createFromFormat("Y-m-d", $an."-11-11");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Armistice 1918");

      // Jour de Noël
      $date = DateTime::createFromFormat("Y-m-d", $an."-12-25");
      $date -> setTime(0,0);
      $events[]=array("date" => $date, "description" => "Jour de Noël");

      if ($alsaceMoselle) {
        // Saint Étienne Alsace
        $date = DateTime::createFromFormat("Y-m-d", $an."-12-26");
        $date -> setTime(0,0);
        $events[]=array("date" => $date, "description" => "Saint-Étienne");
      }

      $found=false;
      $description="";
      foreach ($events as $event) {
        $startDate = $event['date'];
        $endDate = clone $startDate;
        $endDate -> modify('+1 day');
        if ($startDate<=$today && $today<$endDate) {
          $found=true;
          $description = $event['description'];
          break;
        }
      }

      log::add('domogeek', 'info', "public holiday data: '".($found ? "True" : "False")."', '" . $description . "'");
      return array("raw"=> $found, "description" => $description);
    }

    private static function getInformationSeason(): array {
      $seasonDates = array('/12/21' => array('raw'=>1, 'description'=>'hiver'),
                           '/09/21' => array('raw'=>2, 'description'=>'automne'),
                           '/06/21' => array('raw'=>3, 'description'=>'été'),
                           '/03/21' => array('raw'=>4, 'description'=>'printemps'),
                           '/01/01' => array('raw'=>1, 'description'=>'hiver')
                          );
      log::add('domogeek', 'info', "Retrieve season data");
      $found=false;
      $description="";
      $raw=0;
      foreach ($seasonDates AS $key => $value) {
        $SeasonDate = date("Y").$key;
        if (strtotime("now") > strtotime(date("Y").$key)) {
          $found = true;
          $raw = $value['raw'];
          $description = $value['description'];
          break;
        }
      }
      log::add('domogeek', 'info', "season data: '". $raw ."', '" . $description . "'");
      return array("raw"=> $raw, "description" => $description);
    }

    private static function getInformationFeast(): array {
      global $DOMOGEEK_FEAST;

      function datetoDescription (DateTime $date):string {
        global $DOMOGEEK_FEAST;
        $description = "";
        $key = $date->format("m-d");
        if (isset($DOMOGEEK_FEAST[$key])) {
          $nb = 0;
          foreach ($DOMOGEEK_FEAST[$key] as $feast) {
            if ($feast["occurrence"]>1000 || $nb == 0) {
              if ($nb<=3) {
                $description .= $feast["prenom"] . ", ";
              }
              $nb++;
            }
          }
          $description = substr($description, 0, -2);
        } else {
          log::add('domogeek', 'warning', "there is no feast for date '$key'");
        }
        return $description;
      }
      log::add('domogeek', 'info', "Retrieve feast data");
      $descriptionToday = "non défini";
      $descriptionTomorrow = "non défini";
      $found = false;

      if (isset($DOMOGEEK_FEAST)) {
        $date = new DateTime();
        $descriptionToday = datetoDescription($date);
        $found = ($descriptionToday !="");

        $date-> modify('+1 day');
        $descriptionTomorrow = datetoDescription($date);
      } else {
        log::add('domogeek', 'error', "feast data structure 'DOMOGEEK_FEAST' is not defined", 'config');
      }
      log::add('domogeek', 'info', "feast data: '". ($found ? "True":"False") ."', '" . $descriptionToday . "', '". $descriptionTomorrow . "'");
      return array("found"=> $found, "today" => $descriptionToday, "tomorrow" => $descriptionTomorrow);
    }

    private static function getInformationENEDISEcoW(): array {
      function getColorENEDISEcoW(int $value):string {
        switch ($value) {
          case 1: return "vert";
          case 2: return "orange";
          case 3: return "rouge";
          default: return "inconnu";
        }
      }

      $url = "https://particulier.edf.fr/content/dam/2-Actifs/Scripts/ecowattSignal.json";
      log::add('domogeek', 'info', "Retrieve ENEDIS EcoWatt data from url '$url'");

      $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: wget\r\n"
        ]
      ];
      $context = stream_context_create($opts);
      $jsonData = @file_get_contents($url, false, $context);
      if ($jsonData === false) {
        log::add('domogeek', 'error', "EcoWatt: cannot get EcoWatt data");
        return array();
      }

      $rep = json_decode($jsonData, true);
      if ($rep === null) {
        log::add('domogeek', 'error', "EcoWatt: JSON format is incorrect");
        return array();
      }

      if (!isset($rep["signals"]) || !is_array($rep["signals"])) {
        log::add('domogeek', 'error', "EcoWatt: data format is incorrect");
        return array();
      }

      $found = 0;
      $rawToday = 0;
      $descriptionToday = getColorENEDISEcoW($rawToday);
      $rawTomorrow = 0;
      $descriptionTomorrow = getColorENEDISEcoW($rawTomorrow);

      $startToday = new DateTime();
      $startToday -> setTime(0,0);
      $endToday = clone $startToday;
      $endToday-> modify('+1 day');

      $startTomorrow = clone $endToday;
      $endTomorrow = clone $startTomorrow;
      $endTomorrow-> modify('+1 day');
 
      foreach ($rep["signals"] as $signal) {
        if (!isset($signal["jour"]) || !isset($signal["dvalue"])) {
          continue;
        }

        $day = $signal["jour"];
        $date = DateTime::createFromFormat(DateTimeInterface::ISO8601, $day);
        if ($date === false) {
          continue;
        }
        $value = $signal["dvalue"];
        //log::add('domogeek', 'debug', "EcoWatt data: '" . $day . "' (" . ($date->format('Y-m-d H:i:s')) . ")='" .$value . "'");

        if ($startToday <= $date && $date < $endToday) {
          $rawToday = $value;
          $descriptionToday = ucfirst(getColorENEDISEcoW($value)); 
          $found++;
        }
        if ($startTomorrow <= $date && $date < $endTomorrow) { 
          $rawTomorrow = $value; 
          $descriptionTomorrow = ucfirst(getColorENEDISEcoW($value)); 
          $found++;
        }
        if ($found == 2) break;
      }
      log::add('domogeek', 'info', "ENEDIS EcoWatt data: '". $found ."', '" . $rawToday . "', '". $descriptionToday . "', '". $rawTomorrow . "', '". $descriptionTomorrow . "'");
      return array('found' => $found, 'rawToday' => $rawToday, 'descriptionToday' => $descriptionToday, 'rawTomorrow' => $rawTomorrow, 'descriptionTomorrow' => $descriptionTomorrow); 
    }

    private static function getInformationEDFEJP():array {
      // Définition des options (headers)
      $headers = [
        'Host: api-commerce.edf.fr',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0',
        'Accept: application/json, text/plain, */*',
        'Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3',
        'Referer: https://particulier.edf.fr/',
        'Content-Type: application/json',
        'Situation-Usage: Jours Effacement',
        'Application-Origine-Controlee: site_RC',
        'Origin: https://particulier.edf.fr',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: no-cors',
        'Sec-Fetch-Site: same-site',
        'Connection: keep-alive',
        'TE: trailers',
        'Priority: u=4',
        'Pragma: no-cache',
        'Cache-Control: no-cache'
      ]; /* */
      $headers[] = 'X-Request-Id: ' . time() . '460';

      $date = new DateTime();
      $dateTodayTxt = $date->format("Y-m-d");
      $dateTomorrowTxt = (clone $date)->modify('+1 day')->format("Y-m-d");

      // See https://www.domotique-fibaro.fr/topic/16022-quickapp-suivi-abonnement-tempo-edf/page/4/
      $url = "https://api-commerce.edf.fr/commerce/activet/v1/calendrier-jours-effacement"
             . "?option=EJP&dateApplicationBorneInf=". $dateTodayTxt
             . "&dateApplicationBorneSup=". $dateTomorrowTxt
             . "&identifiantConsommateur=src";
      log::add('domogeek', 'info', "Retrieve EDF EJP data from url '$url'");

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      $response = curl_exec($ch);

      if (curl_errno($ch)) {
        log::add('domogeek', 'error', "EJP: cannot get data");
        return array();
      }
      curl_close($ch);

      $webData = json_decode($response, true);
      if ($webData === null) {
        log::add('domogeek', 'error', "EJP: JSON format is incorrect");
        return array();
      }

      try {
        $calendarEJP = $webData['content']['options'][0]['calendrier'];
      } catch (Exception $e) {
        log::add('domogeek', 'error', "EJP: data format is incorrect");
        return array();
      }
      if (!is_array($calendarEJP)) {
       log::add('domogeek', 'error', "EJP: data format is incorrect");
        return array();
      }

      $found = 0;
      $rawToday = "";
      $descriptionToday = "";
      $rawTomorrow = "";
      $descriptionTomorrow = "";

      foreach ($calendarEJP as $entry) {
        if (isset($entry['dateApplication']) && isset($entry['statut'])) {
          $stateDate = $entry['statut']; 
          $stateDateConv = str_replace(
                ["NON_EJP", "HORS_PERIODE_EJP", "EJP"],
                ["False", "False", "True"],
                $stateDate
            );
          if ($entry['dateApplication'] == $dateTodayTxt) {
            $rawToday = $stateDate;
            $descriptionToday = ($stateDateConv == "True")? "Oui" : "Non"; 
            $found++;
          }
          if ($entry['dateApplication'] == $dateTomorrowTxt) { 
            $rawTomorrow = $stateDate; 
            $descriptionTomorrow = ($stateDateConv == "True")? "Oui" : "Non";  
            $found++;
          }
          if ($found == 2) break;
        }
      }
      log::add('domogeek', 'info', "EDF EJP data: '". $found ."', '" . $rawToday . "', '". $descriptionToday . "', '". $rawTomorrow . "', '". $descriptionTomorrow . "'");
      return array('found' => $found, 'rawToday' => $rawToday, 'descriptionToday' => $descriptionToday, 'rawTomorrow' => $rawTomorrow, 'descriptionTomorrow' => $descriptionTomorrow); 
    }

    private static function getInformationEDFTEMPO():array {
      // Définition des options (headers)
      $headers = [
        'Host: api-commerce.edf.fr',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0',
        'Accept: application/json, text/plain, */*',
        'Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3',
        'Referer: https://particulier.edf.fr/',
        'Content-Type: application/json',
        'Situation-Usage: Jours Effacement',
        'Application-Origine-Controlee: site_RC',
        'Origin: https://particulier.edf.fr',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: no-cors',
        'Sec-Fetch-Site: same-site',
        'Connection: keep-alive',
        'TE: trailers',
        'Priority: u=4',
        'Pragma: no-cache',
        'Cache-Control: no-cache'
      ]; /* */
      $headers[] = 'X-Request-Id: ' . time() . '460';

      $date = new DateTime();
      $dateTodayTxt = $date->format("Y-m-d");
      $dateTomorrowTxt = (clone $date)->modify('+1 day')->format("Y-m-d");

      // See https://www.domotique-fibaro.fr/topic/16022-quickapp-suivi-abonnement-tempo-edf/page/4/
      $url = "https://api-commerce.edf.fr/commerce/activet/v1/calendrier-jours-effacement"
             . "?option=TEMPO&dateApplicationBorneInf=". $dateTodayTxt
             . "&dateApplicationBorneSup=". $dateTomorrowTxt
             . "&identifiantConsommateur=src";
      log::add('domogeek', 'info', "Retrieve EDF TEMPO data from url '$url'");

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      $response = curl_exec($ch);

      if (curl_errno($ch)) {
        log::add('domogeek', 'error', "TEMPO: cannot get data");
        return array();
      }
      curl_close($ch);

      $webData = json_decode($response, true);
      if ($webData === null) {
        log::add('domogeek', 'error', "TEMPO: JSON format is incorrect");
        return array();
      }

      try {
        $calendarTEMPO = $webData['content']['options'][0]['calendrier'];
      } catch (Exception $e) {
        log::add('domogeek', 'error', "TEMPO: data format is incorrect");
        return array();
      }
      if (!is_array($calendarTEMPO)) {
       log::add('domogeek', 'error', "TEMPO: data format is incorrect");
        return array();
      }

      $found = 0;
      $rawToday = "";
      $descriptionToday = "";
      $rawTomorrow = "";
      $descriptionTomorrow = "";

      foreach ($calendarTEMPO as $entry) {
        if (isset($entry['dateApplication']) && isset($entry['statut'])) {
          $stateDate = $entry['statut'];
          $stateDateConv = str_replace(
                ["TEMPO_BLEU", "TEMPO_BLANC", "TEMPO_ROUGE"],
                ["Bleu", "Blanc", "Rouge"],
                $stateDate
            );
          if ($entry['dateApplication'] == $dateTodayTxt) {
            $rawToday = $stateDate;
            $descriptionToday = $stateDateConv;
            $found++;
          }
          if ($entry['dateApplication'] == $dateTomorrowTxt) {
            $rawTomorrow = $stateDate;
            $descriptionTomorrow = $stateDateConv;
            $found++;
          }
          if ($found == 2) break;
        }
      }
      log::add('domogeek', 'info', "EDF TEMPO data: '". $found ."', '" . $rawToday . "', '". $descriptionToday . "', '". $rawTomorrow . "', '". $descriptionTomorrow . "'");
      return array('found' => $found, 'rawToday' => $rawToday, 'descriptionToday' => $descriptionToday, 'rawTomorrow' => $rawTomorrow, 'descriptionTomorrow' => $descriptionTomorrow); 
    }

    private static function getInformationMETEOFRANCEVIGILANCE($departement):array {
      function getColorMETEOFRANCEVIGILANCE($id) {
       /*
        • "1" : vert
        • "2" : jaune
        • "3" : orange
        • "4" : rouge
       */
        $colors = [
        1 => "Vert",
        2 => "Jaune",
        3 => "Orange",
        4 => "Rouge"
        ];
        return isset($colors[$id]) ? $colors[$id] : "Inconnu";
      }

      function getRisk($id) {
      /*
       • 1 : vent
       • 2 : pluie
       • 3 : orages
       • 4 : crues
       • 5 : neige / verglas
       • 6 : canicule
       • 7 : grand froid
       • 8 : avalanches
       • 9 : vagues submersion
      */
        $risks = [
        1 => "Vent",
        2 => "Pluie",
        3 => "Orages",
        4 => "Crues",
        5 => "Neige",
        6 => "Canicule",
        7 => "Grandfroid",
        8 => "Avalanches",
        9 => "Vagues"
        ];
        return isset($risks[$id]) ? $risks[$id] : "Inconnu";
      }

      $departementKey=strval($departement);
      if (strlen($departementKey) == 1) $departementKey="0" . $departementKey;

      // See https://donneespubliques.meteofrance.fr/?fond=produit&id_produit=305&id_rubrique=50
      $meteoVigilanceApiKey = config::byKey('meteo_vigilance_apikey', 'domogeek');
      log::add('domogeek',"debug","Using METEO France Vigilance API KEY '".$meteoVigilanceApiKey."'");
      $headers = [
                 "User-Agent: curl/7.88.1",
                 "accept: */*", /* ** */
                 "apikey: " . $meteoVigilanceApiKey,
                 ];
      $url = "https://public-api.meteofrance.fr/public/DPVigilance/v1/cartevigilance/encours";

      log::add('domogeek',"info","Retrieve METEO France Vigilance from url '".$url."'");
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_PROXY, '');
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $response = curl_exec($ch);
      if ($response === false) {
        log::add('domogeek',"error","Vigilance: cannot get data - " . curl_error($ch));
        curl_close($ch);
        return array();
      }
      curl_close($ch);

      $data = json_decode($response, true);
      if ($data === null) {
        log::add('domogeek',"error","Vigilance: JSON format is incorrect");
        return array();
      }

      try {
        $periods = $data['product']['periods'];
      } catch (Exception $e) {
        log::add('domogeek',"error","Vigilance: data format is incorrect");
        return array();
      }
      if (!is_array($periods)) {
        log::add('domogeek',"error","Vigilance: data format is incorrect");
        return array();
      }

      $today = new DateTime();

      $found=false;
      $maxColorId=0;
      $colorIds=array();
      foreach ($periods as $period) {
        if (isset($period['timelaps']) && isset($period['begin_validity_time']) && isset($period['end_validity_time'])) {
          $dateStart = DateTime::createFromFormat(DateTimeInterface::ISO8601, $period['begin_validity_time']);
          $dateEnd = DateTime::createFromFormat(DateTimeInterface::ISO8601, $period['end_validity_time']);
          if ($dateStart <= $today && $today <= $dateEnd) {
            log::add('domogeek',"debug","Vigilance: Period from ".$dateStart->setTimezone(new DateTimeZone('Europe/Paris'))->format("Y-m-d H:i")." to ".$dateEnd->setTimezone(new DateTimeZone('Europe/Paris'))->format("Y-m-d H:i"));
            $timelaps = $period['timelaps'];
            if (isset($timelaps['domain_ids'])) {
              $domains = $timelaps['domain_ids'];
              foreach ($domains as $domain) {
                if ($domain['domain_id'] != $departementKey) {
                  continue;
                }
                log::add('domogeek',"debug","Vigilance: Domain '" . $domain['domain_id'] . "' found");
                $found=true;
                $maxColorId = $domain['max_color_id'];
                if (isset($domain['phenomenon_items'])) {
                  $phenomenons = $domain['phenomenon_items'];
                  foreach ($phenomenons as $phenomenon) {
                    if (isset($phenomenon['phenomenon_id']) && isset($phenomenon['phenomenon_max_color_id'])) {
                      $colorIds[$phenomenon['phenomenon_id']] = $phenomenon['phenomenon_max_color_id'];
                      if (isset($phenomenon['timelaps_items'])) {
                        $items = $phenomenon['timelaps_items'];
                        foreach ($items as $item) {
                          if (isset($item['color_id']) && isset($item['begin_time']) && isset($item['end_time'])) {
                            $dateStart = DateTime::createFromFormat(DateTimeInterface::ISO8601, $item['begin_time']);
                            $dateEnd = DateTime::createFromFormat(DateTimeInterface::ISO8601, $item['end_time']);
                            if ($dateStart <= $today && $today <= $dateEnd) {
                              log::add('domogeek',"debug","Vigilance: Item #". $phenomenon['phenomenon_id'] ." from ".$dateStart->setTimezone(new DateTimeZone('Europe/Paris'))->format("Y-m-d H:i")." to ".$dateEnd->setTimezone(new DateTimeZone('Europe/Paris'))->format("Y-m-d H:i"));
                              $colorIds[$phenomenon['phenomenon_id']] = $item['color_id'];
                            }
                          }
                        }
                      }
                    }
                  }
                }
                break;
              }
            }
          }
        }
      }
      $result=array();
      $result["found"] = $found;
      foreach ($colorIds as $risk => $color) {
        $result["raw" . getRisk($risk)] = $color;
        $result["description" . getRisk($risk)] = getColorMETEOFRANCEVIGILANCE($color);
      }
      $result["rawOverall"]=$maxColorId;
      $result["descriptionOverall"]=getColorMETEOFRANCEVIGILANCE($maxColorId);
      $log="METEO France Vigilance data: ";
      foreach ($result as $key => $value) {
        $log .= "(" . $key . ") '". $value . "', ";
      }
      $log = substr($log,0,-2);
      log::add('domogeek',"info",$log);
      return $result;
    }


    public function getInformations() {
      $url=$this->getConfiguration('url');
      log::add('domogeek', 'info', "Refreshing data");

      //replacing the apidomogeek by php code
      $zoneScolaire = $this->getConfiguration('zone_scolaire');
      $departement = $this->getConfiguration('departement');
      $schoolHoliday = false;
      if ($zoneScolaire != "None") {
        $schoolHoliday = domogeek::getInformationZoneScolaire($zoneScolaire, $departement);
      }

      //replacing the apidomogeek by php code
      $ferie = domogeek::getInformationFerie(false);

      //replacing the apidomogeek by php code
      $isWeekEnd = (date('N', strtotime($date)) >= 6);

      //replacing the apidomogeek by php code
      $latitude = $this->getConfiguration('latitude');
      if ($latitude == 0 || $latitude == "") {
        //take the Jeedom latitude
        $latitude = config::byKey("info::latitude");
        log::add('domogeek', 'debug', "Latitude is not defined in configuration. Take the jeedom latitude: '$latitude'", 'config');
      }
      $longitude = $this->getConfiguration('longitude');
      if ($longitude == 0 || $longitude == "") {
        //take the Jeedom longitude
        $longitude = config::byKey("info::longitude");
        log::add('domogeek', 'debug', "Longitude is not defined in configuration. Take the jeedom longitude: '$longitude'", 'config');
      }
      $sun=date_sun_info(time(), $latitude, $longitude);

      //replacing the apidomogeek by php code for season
      $season = domogeek::getInformationSeason();

      //replacing the apidomogeek by php code for feast
      $feast = domogeek::getInformationFeast();

      //replacing the apidomogeek by php code for ENEDIS EcoWatt
      $ENEDISEcoWatt = domogeek::getInformationENEDISEcoW();

     //replacing the apidomogeek by php code for EDF EJP
      $EDFEJP = domogeek::getInformationEDFEJP();

      //replacing the apidomogeek by php code for EDF TEMPO
      $EDFTEMPO = domogeek::getInformationEDFTEMPO();

      //replacing the apidomogeek by php code for METEO FRANCE VIGILANCE
      $METEOFRANCEVIGILANCE = domogeek::getInformationMETEOFRANCEVIGILANCE($departement);

      foreach ($this->getCmd() as $cmd) {
        $logicalId = $cmd->getLogicalId();
        if ($logicalId == '') $logicalId = $cmd->getConfiguration('data'); //compatibility
        if ($logicalId=="ferie") {
          if (!$ferie['raw']) {
            $cmd->event("Non");
          } else {
            $cmd->event($ferie['description']);
          }
        } elseif ($logicalId=="ferie_raw") {
          $cmd->event($ferie['raw']);
        } elseif ($logicalId=="weekend") {
          if ($isWeekEnd) {
            $cmd->event("Oui");
          } else {
              $cmd->event("Non");
            }
        } elseif ($logicalId=="weekend_raw") {
          $cmd->event($isWeekEnd);
        } elseif ($logicalId=="vacances_scolaires") {
          if (isset($schoolHoliday['raw']) && isset($schoolHoliday['description'])) {
            if (!$schoolHoliday['raw']){
              $cmd->event("Non");
            } else {
              $cmd->event($schoolHoliday['description']);
            }
          }
        } elseif ($logicalId=="vacances_scolaires_raw") {
          if (isset($schoolHoliday['raw'])) {
            $cmd->event($schoolHoliday['raw']);
          }
        } elseif ($logicalId=="duree_jour") {
          $diff = $sun['sunset'] - $sun['sunrise'] - 3600;
          $cmd->event(date("H:i", $diff));
        } elseif ($logicalId=="duree_jour_raw") {
          $diff = $sun['sunset'] - $sun['sunrise'] - 3600;
          $cmd->event(date("Gi", $diff));
        } elseif ($logicalId=="sunset") {
          $cmd->event(date("H:i", $sun['sunset']));
        } elseif ($logicalId=="zenith") {
          $cmd->event(date("H:i", $sun['transit']));
        } elseif ($logicalId=="sunrise") {
          $cmd->event(date("H:i", $sun['sunrise']));
        } elseif ($logicalId=="sunset_raw") {
          $cmd->event(date("Gi", $sun['sunset']));
        } elseif ($logicalId=="zenith_raw") {
          $cmd->event(date("Gi", $sun['transit']));
        } elseif ($logicalId=="sunrise_raw") {
          $cmd->event(date("Gi", $sun['sunrise']));
        } elseif ($logicalId=="ejp_today") {
          if (isset($EDFEJP['descriptionToday'])) $cmd->event($EDFEJP['descriptionToday']);
        } elseif ($logicalId=="ejp_today_raw") {
          if (isset($EDFEJP['rawToday'])) $cmd->event($EDFEJP['rawToday']);
        } elseif ($logicalId=="ejp_tomorrow") {
          if (isset($EDFEJP['descriptionTomorrow'])) $cmd->event($EDFEJP['descriptionTomorrow']);
        } elseif ($logicalId=="ejp_tomorrow_raw") {
          if (isset($EDFEJP['rawTomorrow'])) $cmd->event($EDFEJP['rawTomorrow']);
        } elseif ($logicalId=="season") {
            $cmd->event($season['description']);
        } elseif ($logicalId=="season_raw") {
            $cmd->event($season['raw']);
        } elseif ($logicalId=="feastedsaint"){
          if (isset($feast['today'])) $cmd->event($feast['today']);
        } elseif ($logicalId=="feastedsaint_tomorrow"){
          if (isset($feast['tomorrow'])) $cmd->event($feast['tomorrow']);
        } elseif ($logicalId=="tempo_today"){
          if (isset($EDFTEMPO['descriptionToday'])) $cmd->event($EDFTEMPO['descriptionToday']);
        } elseif ($logicalId=="tempo_today_raw"){
          if (isset($EDFTEMPO['rawToday'])) $cmd->event($EDFTEMPO['rawToday']);
        } elseif ($logicalId=="tempo_tomorrow"){
          if (isset($EDFTEMPO['descriptionTomorrow'])) $cmd->event($EDFTEMPO['descriptionTomorrow']);
        } elseif ($logicalId=="tempo_tomorrow_raw"){
          if (isset($EDFTEMPO['rawTomorrow'])) $cmd->event($EDFTEMPO['rawTomorrow']);
        } elseif ((substr($logicalId,0,strlen("vigilance_")) == "vigilance_") && substr($logicalId,-strlen("_raw")) != "_raw") {
          $vigilanceKey=substr($logicalId,strlen("vigilance_"));
          if (isset($METEOFRANCEVIGILANCE["description".ucfirst($vigilanceKey)])) $cmd->event($METEOFRANCEVIGILANCE["description".ucfirst($vigilanceKey)]);
        } elseif ($logicalId=="ecowatt_today"){
          if (isset($ENEDISEcoWatt['descriptionToday'])) $cmd->event($ENEDISEcoWatt['descriptionToday']);
        } elseif ($logicalId=="ecowatt_today_raw"){
          if (isset($ENEDISEcoWatt['rawToday'])) $cmd->event($ENEDISEcoWatt['rawToday']);
        } elseif ($logicalId=="ecowatt_tomorrow"){
          if (isset($ENEDISEcoWatt['descriptionTomorrow'])) $cmd->event($ENEDISEcoWatt['descriptionTomorrow']);
        } elseif ($logicalId=="ecowatt_tomorrow_raw"){
          if (isset($ENEDISEcoWatt['rawTomorrow'])) $cmd->event($ENEDISEcoWatt['rawTomorrow']);
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
      switch ($this->getLogicalId()) {
        case 'refresh':
          log::add('domogeek', 'debug', "Execute getInformations() from execute(Refresh) method");
          $domogeek->getInformations();
          break;
        default:
          log::add('domogeek', 'warning', 'Unknown command: ' . $this->getLogicalId());
      }
      return false;
    }
  }

?>
