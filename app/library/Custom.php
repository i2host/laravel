<?php

namespace App\library;


class Custom {

    public function htmldata($htmldata,$id,$type="") {

        if ($type=="") {
            $values = "<td><input value='".$id."' type='checkbox' name='table_records[]' class='flat'></td>";
            for ($i =0;$i < sizeof($htmldata);$i++) {
                $values .= ",<td>".$htmldata[$i]."</td>";
            }
        }
        else if ($type == "edit") {
            $values = "<input value='".$id."' type='checkbox' name='table_records[]' class='flat'>";
        }

        return $values;
    }

    public function genNum($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randnum = '';
        for ($i = 0; $i < $length; $i++) {
            $randnum .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randnum;
     }

    public function genStr($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }

}