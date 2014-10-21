<?php
 
const SPACING_X = 1;
const SPACING_Y = 0;
const JOINT_CHAR = '+';
const LINE_X_CHAR = '-';
const LINE_Y_CHAR = '|';
 
$table = array(
array(
    'Name' => 'Trixie',
    'Color' => 'Green',
    'Element' => 'Earth',
    'Likes' => 'Flowers'
),
array(
    'Name' => 'Tinkerbell',
    'Element' => 'Air',
    'Likes' => 'Singing',
    'Color' => 'Blue'
),
array(
    'Element' => 'Water',
    'Likes' => 'Dancing',
    'Name' => 'Blum',
    'Color' => 'Pink'
),
);
$color =array(
    'Name' => 'red',
    'Color' => 'Green',
    'Element' => 'pink',
    'Likes' => 'yellow'
);
 

 
    $nl = "\n";
    $columns_headers = columns_headers($table);
    $columns_lengths = columns_lengths($table, $columns_headers);
    $row_separator = row_seperator($columns_lengths);
    $row_spacer = row_spacer($columns_lengths,$columns_headers);
    $row_headers = row_headers($columns_headers, $columns_lengths);

    echo '<pre>';

    echo $row_separator . $nl;
    echo str_repeat($row_spacer . $nl, SPACING_Y);
    echo $row_headers . $nl;
    echo str_repeat($row_spacer . $nl, SPACING_Y);
    echo $row_separator . $nl;
    echo str_repeat($row_spacer . $nl, SPACING_Y);
    foreach($table as $row_cells)
    {
        $row_cells = row_cells($row_cells, $columns_headers, $columns_lengths);
        echo $row_cells . $nl;
        echo str_repeat($row_spacer . $nl, SPACING_Y);
    }
    echo $row_separator . $nl;

    echo '</pre>';
    
 
function columns_headers($table){
    return array_keys(reset($table));
}
 
function columns_lengths($table, $columns_headers){
    $lengths = [];
    foreach($columns_headers as $header)
    {
        $header_length = strlen($header);
        $max = $header_length;
    foreach($table as $row)
    {
        $length = strlen($row[$header]);
    if($length > $max)
        $max = $length;
    }

    if(($max % 2) != ($header_length % 2))
        $max += 1;

        $lengths[$header] = $max;
    }
 
    return $lengths;
}
 
function row_seperator($columns_lengths){
    $row = '';
    foreach($columns_lengths as $column_length)
    {
        $row .= "<span style='background-color:white'>".JOINT_CHAR . str_repeat(LINE_X_CHAR, (SPACING_X * 2) + $column_length);
    }
        $row .= JOINT_CHAR."</span>";

    return $row;
}
 
function row_spacer($columns_lengths,$columns_headers){
    global $color;
    $row = '';
    foreach($columns_lengths as $column_length)
    {
        $row .= "<span style='background-color:blue'>".LINE_Y_CHAR . str_repeat(' ', (SPACING_X * 2) + $column_length);
    }
    $row .= LINE_Y_CHAR."</span>";

    return $row;
}
 
function row_headers($columns_headers, $columns_lengths){
    global $color;
        $row = '';
    foreach($columns_headers as $header)
    {
        $row .= "<span style='background-color:".$color[$header]."'>".LINE_Y_CHAR . str_pad($header, (SPACING_X * 2) + $columns_lengths[$header], ' ', STR_PAD_BOTH);
    }
        $row .= LINE_Y_CHAR."</span>";

        return $row;
}
 
function row_cells($row_cells, $columns_headers, $columns_lengths){
    global $color;
    $row = '';
    foreach($columns_headers as $header)
    {
        $row .= "<span style='background-color:".$color[$header]."'>".LINE_Y_CHAR . str_repeat(' ', SPACING_X) . str_pad($row_cells[$header], (SPACING_X + $columns_lengths[$header]), ' ', STR_PAD_RIGHT);
    }
        $row .= LINE_Y_CHAR."</span>";

    return $row;
}
 
 
