<?php

    class checkKey{
        private $url;

        function __construct($url){
            $this->url = $url;
        }

        function check_key($key){
            $val = explode("?",$this->url);

            for ($i=0; $i < count($val); $i++) { 
                if(explode("=",$val[$i])[0] == $key){
                    return true;
                }
            }
        }

        function get_url(){
            return $this->url;
        }
    }

?>