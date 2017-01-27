<?php
function strToBin($input)
{
	if(!is_string($input))
	return false;
	$input=unpack('H*',$input);
	$chunks=str_split($input[1],2);
	$ret='';
	foreach($chunks as $chunk)
	{
		$temp=base_convert($chunk,16,2);
		$ret.=str_repeat("0", 8 - strlen($temp)) . $temp." ";//remove this space
	}
	return $ret;
}
function binToStr($str)
{
    $str=explode(" ",$str);
    $rs='';
    foreach($str as $data)
    {
        $rs.=pack('H*',base_convert($data,2,16));
    }
    return $rs;
}
function flipBytes($bytes)
{
	return str_replace('3','0',str_replace('0','1',str_replace('1','3',$bytes)));
}
$str="string to convert to binary Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, alias sapiente eum ullam nesciunt molestias nobis cumque praesentium veritatis hic consequuntur quis eveniet iusto! Dolorem, nesciunt voluptatem totam consectetur illum?";
$bin=strToBin($str);
$flippedBytes=flipBytes($bin);
echo binToStr($flippedBytes);
?>