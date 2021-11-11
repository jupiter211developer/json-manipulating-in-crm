<?php
$values = json_decode((string)file_get_contents('./values.txt'), true);
$labels = json_decode((string)file_get_contents('./labels.txt'), true);
$bigstr='';
$bigresult='';
$result = [];

foreach ($labels as $item) {
    $label = $item['label'];
    $id = $item['id'];

    $value = '';

    foreach ($values as $v_item) {
        if ($v_item['id'] == $id) {
            $value = $v_item['value'];

            if ($value == '' || !isset($value[0])) {
                continue;
            }

            if (strlen($value['0']) != 1) {
                if (count($value) > 0) {
                    $value = $value[0];

                    $str = ($label."=".$value);
                    $bigresult=$bigresult . $str . "<br>";
                    $result[] = $str;
                }
            } else {

                $str = ($label."=".$value);
                $bigresult=$bigresult . $str . "<br>";
                $result[] = $str;
            }
            break;
        }
    }
}
$env["version"]='PHP version: ' . phpversion();

$env["pt"]=$bigresult;

echo $bigresult;