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

}