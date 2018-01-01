<?php 


    class Registery{

        private static $ins;
        private function __construct(){

        }
        private function __colne(){

        }

        public static function showInst(){
            if(null === self::$ins)
                self::$ins = new self();

            return self::$ins;
        }

        public function access(){
            echo 'You got me';
        }
    }


    $reg = Registery::showInst();
    echo $reg->access();

?>