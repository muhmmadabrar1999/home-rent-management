<?php
/**
 * Created by PhpStorm.
 * User: hbot
 * Date: 5/1/17
 * Time: 11:37 AM
 */

function hasUserPermission($user_id,$permission_id){

        $havePermission = \DB::table('user_has_permissions')->where('user_id',$user_id)->where('permission_id',$permission_id)->get();
        if(count($havePermission)){
            return true;
        }
        return false;
}
function getUserRole($user){
    if($user->hasRole('admin')) { return  'Admin'; }
    if($user->hasRole('supervisor')) { return  'Supervisor'; }
    if($user->hasRole('operator')) { return  'Operator'; }

}

function floorLevel($floor){
    $floors = [
        '-1' => 'Basement',
        '0' => 'Ground',
        '1' => '1st',
        '2' => '2nd',
        '3' => '3rd',
        '4' => '4th',
        '5' => '5th',
        '6' => '6th',
        '7' => '7th',
        '8' => '8th',
        '9' => '9th',
        '10' => '10th',
        '11' => '11th',
        '12' => '12th',
        '13' => '13th',
        '14' => '14th',
        '15' => '15th',
        '16' => '16th',
        '17' => '17th',
        '18' => '18th',
        '19' => '19th',
        '20' => '20th',
        '21' => '21th',
        '22' => '22th',
        '23' => '23th',
        '24' => '24th',
        '25' => '25th',
        '26' => '26th',
        '27' => '27th',
        '28' => '28th',
        '29' => '29th',
        '30' => '30th'
    ];
    return $floors[$floor];
}
function flatType($type){
    $types = [
        '1' => 'A',
        '2' => 'B',
        '3' => 'C',
        '4' => 'D',
        '5' => 'E',
        '6' => 'F',
        '7' => 'G',
        '8' => 'H',
        '9' => 'I',
        '10' => 'J',
        '11' => 'K',
        '12' => 'L'
    ];
    return $types[$type];
}