<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 27/04/18
 * Time: 12:53
 * @param $alerta
 * @param $sms
 * @param $titulo
 * @return string
 */

 function callback($alerta,$sms,$titulo,$src=null)
{
    $calback['alerta']=$alerta;
    $calback['sms']=$sms;
    $calback['titulo']=$titulo;
    $calback['src']=$src;
    return "[".json_encode($calback)."]";
}

function dispensado()
{
    return array("editar","eliminar","add_privilegio","detalhe","recibo","add_conta","descrição","Adicionar Pessoa","Estoque");
}

function menu_dispensado()
{
    return array("Funcionalidade","Grupo","Sub Menu","Estoque","Utilizador","Estante","Estatística","destinatário","Categoria");
}

function membro($param)
{
	$ret=0;
	switch ($param)
	{
		case 0:
			$ret="NÃO";
			break;
		case 1:
			$ret="SIM";
			break;
	}
	return $ret;
}

function master()
{
    return "Master";
}

function geraCod($param)
{
	if ($param<=9)
		return "0".$param;
	else
		return $param;
}


function Iniciais($nome,$minuscula=true)
{
	$nome=ucwords(strtolower($nome));
	$nome=preg_replace("/([Da|da|De|de|Di|di|Do|do|Du|du|A|a])/","",$nome);
	preg_match_all('/\s?([A-Z])/',$nome,$matches);
	$ret=implode('',$matches[1]);
	return $minuscula?strtolower(substr($ret,0,2)):substr($ret,0,2);
}
/**
 * @param array $nome
 * @param array $link
 * @param array $fa
 * @param array $cor
 * @return array
 */
function dinamic_menu_topo($nome=array(), $link=array(), $fa=array(), $cor=array())
{
    return array(
        'nome'=>$nome,
        'link'=>$link,
        'fa'=>$fa,
        'cor'=>$cor
    );
}

function permitido()
{
    return array("app","dashboard","utilizador","perfil");
}

/**
 * @param $estado
 * @param $genero
 * @return null|string
 */
function estado_civil($estado, $genero)
{
    $ret=null;
    switch ($estado)
    {
        case "C":
            if($genero=="F")
                $ret="Casada";
            else
                $ret="Casado";
            break;
        case "D":
            if($genero=="F")
                $ret="Divorciada";
            else
                $ret="Divorciado";
            break;
        case "S":
            if($genero=="F")
                $ret="Solteira";
            else
                $ret="Solteiro";
            break;
        case "V":
            if($genero=="F")
                $ret="Viúva";
            else
                $ret="Viúvo";
            break;
    }
    return $ret;
}

function gerarNumeroOrdem($cod)
{
    if(strlen($cod)==1)
        return "00".$cod;
    elseif(strlen($cod)==2)
        return "0".$cod;
    elseif(strlen($cod)==3)
        return $cod;
}

function tipo($param)
{
	if ($param==0)
		return "Emergência";
	else
		return "Especialidade";
}

function tipo_relatorio($param)
{
    $ret=null;
    switch ($param)
    {
        case 'mensal':
            $ret="Mensal";
            break;
        case 'trim':
            $ret="Trimestral";
            break;
        case 'sem':
            $ret='Semestral';
            break;
        case 'anual':
            $ret='Anual';
            break;
    }

    return $ret;
}

/**
 * @param $id_utente
 * @return string
 */
function gerarCodigo($sequencia,$especidalide)
{
    $exp=str_pad($especidalide,5,"");
    $exp=$exp[0].$exp[1].$exp[2];
    return gerarNumeroOrdem((string)$sequencia).'-'.strtoupper($exp).'-'.date('y');
}

/**
 * @param $idTerreno
 * @return string
 */
function gerarParteNumerica($cod)
{
    $cod=$cod.""; //concatennar com caracter vazio, passar para string
    $cod.rtrim($cod);// eliminar espaco vazio
    if (strlen($cod) == 1) {//controlar a qtd de caracteres
        return "0000" . $cod; //concatena para ter 5  carecteres representativos do numero do terreno
    } else
        if (strlen($cod) == 2) {
            return "000" . $cod;
        } else
            if (strlen($cod) == 3) {
                return "00" . $cod;
            } else
                if (strlen($cod) == 4) {
                    return "0" . $cod;
                }

    return  "";
}

/**
 * @param $provincia
 * @param $municipio
 * @param $comuna
 * @param $idTerreno
 * @return string
 */
function gerarCodigoTerreno($municipio, $comuna, $idTerreno)
{
    $municipio=strtoupper($municipio);
    $comuna=strtoupper($comuna);
    return substr($municipio,0,1).substr($municipio,strlen($municipio)-1,1).
        substr($comuna,0,1).substr($comuna,strlen($comuna)-1,1).
        gerarParteNumerica($idTerreno);
}

 function area($a,$b)
{
    return $a*$b;
}

function soNumero($str)
{
    return preg_replace("/[^0-9]/","",$str);
}

 function semana($d1,$d2)
{
	$dia="";
	date_default_timezone_set('Africa/Luanda');
    $data1=new DateTime($d1);
    $data2=new DateTime($d2);
    if ($data1->diff($data2)->days<=1)
    	return $data1->diff($data2)->days." dia";
    else
    	return $data1->diff($data2)->days." dias";
}

function ctrl_tempo($d1,$d2)
{
    date_default_timezone_set('Africa/Luanda');
    $data1=new DateTime($d1);
    $data2=new DateTime($d2);
    return $data1->diff($data2)->days;
}

function user_name($param)
{
    $user=explode(" ",$param);
    $res=null;
    for ($i=0;$i<count($user);$i++)
    {
        $res=$user[0].".".$user[$i];
    }

    return strtolower($res);
}

function nome_utilizador($param)
{
    $user=explode(" ",$param);
    $res=null;
    for ($i=0;$i<count($user);$i++)
    {
        $res=$user[0]." ".$user[$i];
    }

    return $res;
}


function sigla($param)
{
    $ponto=".";
    if (strlen($param)<=15)
        return $param;
    else{
        $split_param=explode(" ",$param);
        $res='';
        if (count($split_param)>2)
        {
            for ($i=0;(count($split_param))>$i;$i++)
            {
                if ($i+1==count($split_param))
                    $ponto="";
                if (strlen($split_param[$i])>=2)
                {
                    if ($split_param[$i]=="de"||$split_param[$i]=="do")continue;
                        $res.=substr($split_param[$i],0,count($split_param[$i])).$ponto;
                }
            }
            return $res;
        }
    }
}

function upload ($tmp, $nome, $largura,$a, $pasta)
{
    $img = imagecreatefromjpeg($tmp);
    $x   = imagesx($img);
    $y   = imagesy($img);
    $altura = ($largura * $y) / $x;
    $nova  = imagecreatetruecolor($largura, $a);

    imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $a, $x, $y);
    imagejpeg($nova, "$pasta/$nome");
    imagedestroy($nova);
    imagedestroy($img);
    return($nome);
}
function upload_png ($tmp, $nome, $largura,$a, $pasta)
{
    $img = imagecreatefrompng($tmp);
    $x   = imagesx($img);
    $y   = imagesy($img);
    $altura = ($largura * $y) / $x;
    $nova  = imagecreatetruecolor($largura, $a);

    imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $a, $x, $y);
    imagepng($nova, "$pasta/$nome");
    imagedestroy($nova);
    imagedestroy($img);
    return($nome);
}

function codigo_utente($sequencia,$tipo)
{
    return gerarNumeroOrdem((string)$sequencia)."-".$tipo."-".date('y');
}

function estado($param)
{
    $ret=null;
    switch ($param)
    {
        case 0:
            $ret='Aguardando Resposta';
            break;
        case 1:
            $ret='Concluído';
            break;
        case 2:
            $ret='Pendente';
            break;
    }
    return $ret;
}

function retornaRole($param)
{
	$ret=0;
	switch ($param)
	{
		case 'SPOA':
			$ret="spoa";
			break;
		case 'SIAPO':
			$ret="siapo";
			break;
		case 'SOE':
			$ret="soa";
			break;
		case 'SOG':
			$ret="sog";
			break;
		case 'SOTV':
			$ret="sotv";
			break;
	}
	return $ret;
}

function idade($param)
{
	$data=explode("-",$param);
	return date('Y')-$data[0];
}

function raca($param)
{
	$ret="";
	switch ($param)
	{
		case 'B':
			$ret="Branca";
			break;
		case 'N':
			$ret="Negra";
			break;
	}
	return $ret;
}

function genero($param)
{
	$ret="";
	switch ($param)
	{
		case 'F':
			$ret="Feminino";
			break;
		case 'M':
			$ret="Masculino";
			break;
	}
	return $ret;
}
