<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
      class Nusoap_lib{
          function Nusoap_lib(){
                //require_once(str_replace("\\","/",APPPATH).'libraries/NuSOAP/lib/nusoap.php'); //If we are executing this script on a Windows server
          		require_once('NuSOAP/lib/nusoap.php');
          }
      }
?>