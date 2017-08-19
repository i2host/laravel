<?php

namespace App\library;

use Illuminate\Support\Facades\DB;

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

    public function lastsort($table,$option="") {
        if ($option == "") {
        $lastsort = DB::table($table)->orderBy('sort', 'desc')->limit(1)->get();
        }
        else {
        $lastsort = DB::table($table)->where($option[0],$option[1],$option[2])->orderBy('sort', 'desc')->limit(1)->get();
        }
        if (sizeof($lastsort) == 0)
        $lastsort = 1;
        else 
        $lastsort = $lastsort[0]->sort + 1;
        return $lastsort;
    }

}