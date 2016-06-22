<?php
$idPersonalDestinatario = "Destinatario";
$nombre= "M. en T.I. Lucina Guadalupe";
$apellido= "Arce Ávila";
$id= "adfa";
$puesto  = "Director";
$anio =strftime("%Y");
$oficioNumero = $anio;
require('fpdf.php');
class PDF extends FPDF{

function Header(){
	global $totalWidth;
	global $organization;
	global $department;
	global $lema;
	global $tolerance;
	global $topMargin;
	global $bottomMargin;
	global $leftMargin;
	global $rigthMargin;
	global $title;
    global $place;
	global $hoy;
	global $titleFontSize;
	global $figureSize;
	global $deptartment;
	global $lema;

    $this->SetFont('Helvetica','B',$titleFontSize);
    // Calculate width of title and position
    $w = $this->GetStringWidth($department)+$tolerance;
    $this->Image('umsnhLogo.gif',$leftMargin,$topMargin,$figureSize);
    $this->Image('ccu-grande-negro_gif.jpg',$totalWidth-$leftMargin-$figureSize,$topMargin,$figureSize-2);
	$boxLength = 85;
    $this->SetX(($totalWidth-$boxLength )/2);
    $this->MultiCell($boxLength ,7,$organization,0,'C');
    // Line break
    //	$this->Ln(10);
    //	$this->SetFont('Helvetica','',10);

    $this->SetX(($totalWidth-$boxLength )/2);
	$this->SetFont('Helvetica','',10);
	$w = $this->GetStringWidth($department);
	//$this->SetX(($totalWidth-$w-$leftMargin));
	$this->Cell($boxLength,9,$department,0,0,'C');
    $this->Ln(10);
	$this->SetFont('Helvetica','',10);
	$oficNum ="8376658474"."/".strftime("%Y");
	$oficNum = iconv("UTF-8", "ISO-8859-1", "Oficio número:").$oficNum;
	$this->Ln(5);
	$w = $this->GetStringWidth($oficNum);
	$this->SetX(($totalWidth-$w-$leftMargin));
	$this->Cell($w,9,$oficNum,0,0,'C');
	$this->Ln(10);
	$this->SetFont('Helvetica','I',10);
    //$this->SetX(($totalWidth-$boxLength )/2);
	$this->SetLineWidth(0.0);

	//aqui va el lema adfadf
	$this->SetFont('Helvetica','',10);
	$w = $this->GetStringWidth($hoy.", ".$place);
	$this->SetX(($totalWidth-$w-$leftMargin));
	$this->Cell($w,9,$place.", ".$hoy,0,0,'C');
}

/*function Body(){
	$nombre =  "Alondra Perez";
	$w = $this->GetStringWidth($nombre);
	$this->Cell($w,9,$nombre,1,0,'C');

}*/


function Lema(){}
function DeptInfot(){}
function printDate(){}
function dest(){}
//function body(){}
function senderInfo(){}
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
   // $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}



function ChapterTitle($num, $label,$department){
	global $normalLetterSize;
    // Arial 12
    $this->SetFont('Helvetica','',$normalLetterSize);
    // Background color
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,$depto,0,1,'L',true);
	$this->Cell(0,6,"Oficion  No. $num : $label",0,1,'L',true);
    // Line break
    $this->Ln(4);
}

function LetterBody($dest,$cuerpo,$header,$calificaciones,$cierre,$puesto){
	global $totalWidth;
	global $leftMargin;
	global $normalLetterSize;
	$name = $dest;

 	$file ="adfadsf";
	$txt = $file;
    // Times 12
    $this->SetFont('Helvetica','B',$normalLetterSize);
  	$this->SetY(75);
    // Output justified text
    //  $puesto = "Director de la Facultad de Historia";
    //	$this->writeHTML('This is my disclaimer. <b>THESE WORDS NEED TO BE BOLD.</b> These words do not need to be bold.');

	$w =  $this->GetStringWidth($name)+6;
    $this->MultiCell(100,5,"C. ".$name);
	$this->SetFont('Helvetica','',$normalLetterSize);
	$w =  $this->GetStringWidth($puesto)+6;
    //$this->MultiCell(100,5,$puesto);
	$this->MultiCell(100,5,"Presente.");
	$this->SetFont('Helvetica','',$normalLetterSize);
    // Line break
    $this->Ln(5);
    $this->SetFont('','');
	$this->MultiCell($totalWidth-$leftMargin*2,5,iconv("UTF-8", "ISO-8859-1",$cuerpo));
    $this -> BasicTable($header,$calificaciones);
	$this->Ln(5);
	$this->SetFont('Helvetica','',$normalLetterSize);
    $this->Cell(0,5,$cierre,'C');
    $this->Ln(10);
    $this->Cell(0,5,'Sin otro particular por el momento, aprovecho la oportunidad para saludarle.','C');
	
}


function CloseLetter($remitente,$puesto,$lema){
	global $totalWidth;
	global $leftMargin;
	global $normalLetterSize;
	$Y = $this->GetY();
	$this ->SetY($Y);
	$this->Ln(10);
	$this->SetFont('Helvetica','B',12);
	$this->MultiCell($totalWidth-$leftMargin*2,5,"Atentamente",0,'C');
	//$this->Ln(10);
    $this->SetFont('Helvetica','I',12);
    $this->MultiCell($totalWidth-$leftMargin*2,5,$lema,0,'C');
	$this->Ln(15);
	$this->SetFont('Helvetica','B',12);
	$this->MultiCell($totalWidth-$leftMargin*2,5,$remitente,0,'C');
	$this->SetFont('Helvetica','',$normalLetterSize);
      $this->SetX(($totalWidth-80 )/2);
    $this->MultiCell(80 ,5,$puesto,0,'C');
    
//	$this->MultiCell($totalWidth-$leftMargin*2,5,$puesto,0,'C');
}


function footNote($dests){
	global $totalWidth;
	global $leftMargin;
	global $normalLetterSize;
	//aqui se ubica el cursor, en este caso es enseguida del ultimo renglon
	$Y = $this->GetY();
	$this ->SetY(255);
	$this->Ln(5);
	$this->SetFont('Helvetica','',7);
     $this->MultiCell($totalWidth-$leftMargin*2,3,"C.c.p.",0,'L');
    foreach ($dests as $d){
        $this->MultiCell($totalWidth-$leftMargin*2,3,$d,0,'L');
    }
	
   // $this->MultiCell($totalWidth-$leftMargin*2,3,$dests[1],0,'L');
}


function PrintChapter($num, $title, $file){
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->LetterBody();
}
    
function BasicTable($header, $data)
{
    // Header   
    $this->Ln();
    $ii=1;
    
  //  20,10,'Title',1,1,'C'
    
    foreach($header as $col){
         if ($ii==1){
             $this->Cell(100,7,$col,1,'C');
         }else{
               $this->Cell(60,7,$col,1,0,'C');
         }
         $ii=$ii+1;
   
    }
       
    $this->Ln();
    // Data
    foreach($data as $row){
        $ii=1;
        foreach($row as $col){
            if ($ii==1){
                $this->Cell(100,7,$col,1,'C');
            }else{
                 $this->Cell(60,7,$col,1,0,'C');
            }
            $ii=$ii+1;
        }
        $this->Ln();
    }
}



}
      
        


 session_start();
	include('consulta_ceneval/server.php');
	$mysqli = new mysqli($hostname, $username, $password,$bdeDatos);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
    $tableName = "umichccu_sistemaIncidentes.ejemplo";
	$folioCeneval=292722052;
	$query="SELECT NOMBRE, APE_MAT, APE_PAT, FOLIO_CENEVAL, MATRICULA, LUG_GPI, PCNE, PPMA, PPAN, DICTAMEN FROM umichccu_sistemaIncidentes.ejemplo where FOLIO_CENEVAL=$folioCeneval";
    $query = "select * from info_completa_aspirantes where FOLIO_CENEVAL=$folioCeneval";
//	echo $query;
	$result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $lugar = $row['LUG_GPI'];
        $nombre = $row['nombre_aspirante']." ".$row['APE_PAT']." ".$row['APE_MAT'];
        $matricula = $row['MATRICULA'];
        $dictamen = $row['DICTAMEN'];
        $carrera = $row['nombre_carrera'];
        $facultad = $row['nombre'];
        
        $PCNE = $row['PCNE'];
        $pensamiento_Matematico=$row['PPMA'];
        $pensamento_analitico=$row['PPAN'];
        $comprension_lectora = $row['PCLE'];
        $lenguaje_escrito = $row['PDD_MC_LES'];
        $biologia = $row['PDD_MC_BIO'];
        $quimica = $row['PDD_MC_QUI'];
        $ingles= $row['PDD_MC_ING'];
        $promedio = $row['PGPI'];
        
        
            
        



setlocale (LC_TIME, "es_ES");
date_default_timezone_set('America/Mexico_City');

$totalWidth = 210;
$tolerance = 6;
$topMargin = $bottomMargin = 25;
$leftMargin = $rightMargin = 25;
$titleFontSize = 15;
$figureSize = 25;
$normalLetterSize = 12;
$decodif = "UTF-8";

$organization =  'UNIVERSIDAD MICHOACANA DE SAN NICOLÁS DE HIDALGO';
$organization = iconv("UTF-8", "ISO-8859-1", $organization);

$department = "Centro de Cómputo y Procesos de Información Universitaria";
$department = iconv("UTF-8", "ISO-8859-1", $department);

$lema = '"2015, Año del Generalísimo Jose María Morelos y Pavón"';
$lema = '"Cuna de Héroes, Crisol de Pensadores"';
$lema = iconv("UTF-8", "ISO-8859-1", $lema);

$remitente = "M. en T.I. Elvia Lucina Guadalupe Arce Ávila";
$remitente = iconv("UTF-8", "ISO-8859-1", $remitente);

//$puesto = "Directora del Centro de Cómputo y Procesos de Información Universitaria";
$puesto = "puesto";
$puesto = iconv("UTF-8", "ISO-8859-1", $puesto);


$dest = iconv("UTF-8", "ISO-8859-1", $nombre);

$licenciatura =  $carrera;
$ciclo = "2016/2017";
$localidad = "Foráneo";


$cuerpo = 'Por este medio, le informo que de acuerdo a los resultados de la aplicación del examen de CENEVAL para el ingreso a la Licenciatura en '.$licenciatura.' de la '.$facultad.' ciclo escolar '.$ciclo.', las calificaciones obtenidas por usted en la relación de solicitantes '.$localidad.' fueron las siguientes:';

$cierre = "Así mismo le comunico que obtuvo el lugar ".$lugar." con una calificación ponderada de ".$promedio;
$cierre = iconv("UTF-8", "ISO-8859-1", $cierre);

$conCopia = 'C.c.p. Dr. Jaime Espino Valencia, \n Secretario Académico de la Universidad Michoacana de San Nicolás de Hidalgo. Dr. José Apolinar Cortes, Director de Control Escolar de la Universidad Michoacana, Mtro. Gabino Estévez Delgado, Coordinador de la Comisión Especial para analizar los Mecanismos de Ingresoa la Universidad Michoacana. Dra. Silvia Hernández Capi, Directora de la Facultad de Ciencias Médicas y Biológicas "Dr. Ignacio Chavez"';
$conCopia = iconv("UTF-8", "ISO-8859-1", $conCopia);
        
        
$conCopiaA = array
  (
    iconv("UTF-8", "ISO-8859-1", 'Dr. Jaime Espino Valencia, Secretario Académico de la Universidad Michoacana de San Nicolás de Hidalgo'),
        iconv("UTF-8", "ISO-8859-1", 'Dr. José Apolinar Cortes, Director de Control Escolar de la Universidad Michoacana'),
        iconv("UTF-8", "ISO-8859-1", 'Mtro. Gabino Estévez Delgado, Coordinador de la Comisión Especial para analizar los Mecanismos de Ingresoa la Universidad Michoacana'),
          iconv("UTF-8", "ISO-8859-1", 'Dra. Silvia Hernández Capi, Directora de la Facultad de Ciencias Médicas y Biológicas "Dr. Ignacio Chavez"')      
                
  );           


$tipo = 'Memorandum';
$asunto = 'Saludos';
$place = 'Morelia, Michoacán';
$place = iconv("UTF-8", "ISO-8859-1", $place);

$hoy =strftime("%A, %d de %B de %Y");

$nombreColumna1 =iconv("UTF-8", "ISO-8859-1", 'Habilidad'); 
$nombreColumna2 =iconv("UTF-8", "ISO-8859-1", 'Calificación'); 
$header = array($nombreColumna1, $nombreColumna2);

$calificaciones = array
  (
    array(iconv("UTF-8", "ISO-8859-1", 'PCNE'),$PCNE),
    array(iconv("UTF-8", "ISO-8859-1", 'Pensamiento Matemático'),$pensamiento_Matematico),
    array(iconv("UTF-8", "ISO-8859-1", 'Pensamiento Analítico'),$pensamento_analitico),
     array(iconv("UTF-8", "ISO-8859-1", 'Comprensión Lectora'),$comprension_lectora),
     array(iconv("UTF-8", "ISO-8859-1", 'Lenguaje Escrito'),$lenguaje_escrito),
     array(iconv("UTF-8", "ISO-8859-1", 'Biología'),$biologia),
     array(iconv("UTF-8", "ISO-8859-1", 'Química'),$quimica),
     array(iconv("UTF-8", "ISO-8859-1", 'Inglés'),$ingles)
  );


$pdf = new PDF();
$pdf -> SetMargins($leftMargin, $topMargin , $rightMargin);
$pdf -> AddPage();

$pdf -> LetterBody($dest,$cuerpo,$header,$calificaciones,$cierre,$puesto);



$puestoDelRemitente = "Directora del Centro de Cómputo y Procesos de Información Universitaria";
$puestoDelRemitente = iconv("UTF-8", "ISO-8859-1", $puestoDelRemitente);
$pdf -> CloseLetter($remitente,$puestoDelRemitente,$lema);
$pdf -> footNote($conCopiaA);
$pdf -> Output();

//You can do an else, but I prefer a separate statement


        
         
                        
                      
                    }else{
                        echo "<p>No hay resultados: Verifica tu numero de matrícula</p>";
                    }

?>
