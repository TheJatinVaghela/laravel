<?php

if(!function_exists('TRY_CHATCH')){

    function TRY_CHATCH($func = NULL){

        if(is_callable($func)){

            try {
                $data = $func();
            } catch (\Exception $th) {
                return ['data'=>NULL,'error'=>$th->getMessage() , 'status'=>500];
            }
            return array("data"=>$data, "status"=>200,"message"=>'success');
        }else{
            return ['error'=>'function TRY_CHATCH failed'];
        }
    };
};
if(!function_exists('p')){
    function p($stuf){
        echo '<pre>';
        print_r($stuf);
        echo '</pre>';
    }
}
