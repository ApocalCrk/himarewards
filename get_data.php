<?php
require_once __DIR__ . '/vendor/autoload.php';
use Shuchkin\SimpleXLSX;

$id = intval($_GET['id']);

if(!$id) {
    echo 'No id';
    exit;
}else{
    if ( $xlsx = SimpleXLSX::parse('https://studentsuajyac-my.sharepoint.com/:x:/g/personal/210711480_students_uajy_ac_id/EdVXrWyRCPxPs4z7uY3blaEBuyEGbI2HRsYs11yPeFE9Sg?e=towgxa') ) {
        $data_excel = $xlsx->rows();
        
        $data_all = array_slice($data_excel, 1);
        $data = array_slice($data_all, 2, 50);
        $data = array_map(function($row) {
            return [
                'rank' => $row[0],
                'name' => $row[1],
                'uts' => $row[5],
                'workshop' => $row[6],
                'sharing1' => $row[7],
                'pengabdian' => $row[8],
                'sharing2' => $row[9],
                'uas' => $row[10],
                'score' => $row[12],
            ];
        }, $data);
        
        usort($data, function($a, $b) {
            return $b['score'] - $a['score'];
        });

        $rank = 1;
        foreach ($data as $key => $value) {
            $data[$key]['rank'] = $rank;
            $rank++;
        }

        foreach ($data as $key => $value) {
            if ($value['rank'] == $id) {
                header("Content-Type: application/json");
                echo json_encode($value);
            }
        }
    } else {
        echo SimpleXLSX::parseError();
    }
}