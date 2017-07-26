<?php
/*
 * Purpose: let the user place a signature on monitor, even better on a tablet with a stylo.
 * After that, the signature will be placed in a pdf file (new or already existing) or in a html page as an image (.png)
 * 
 * TANKS TO:
 * 
 * oliver@fpdf.org (fpdf library)
 * Setasign - Jan Slabon (fpdi library)
 * jSignature (for the clientside)
 * 
 */
class signature {
         
    var $pdf;
    var $hash;
    var $image;
     
    function __construct(){
        require('fpdf/fpdf.php');
        require('fpdi/fpdi.php');
        $this->make_hash();
        $this->make_signature();
    }
    
    // makes aan unique id for image creation
    function make_hash(){
        $this->hash = uniqid();
    } 
    
    // creates the image (if dir is writable)
    function make_signature(){
        if(isset($_POST['img'])){
            $arr = explode(',',$_POST['img']);
            $this->image = "image{$this->hash}.png";
            if(is_writable(dirname(__FILE__))){
                file_put_contents($this->image, base64_decode($arr[1]));
            }else{
                die('<p>The working directory is not writable, abort.</p>');
            }
        }
    }
    
    // delete the image (if exists)
    function delete_signature(){
        if(file_exists($this->image)) @unlink($this->image);
    }
    
    // embeds the signature in a html file
    function embed_in_html($filename){
        if(isset($_POST['sign'])){
            if(is_writable(dirname(__FILE__))){
                file_put_contents($filename.'.html', '<html></html><body>oi<img src="'.$_POST['sign'].'" /></body>');
            }else{
                die('<p>The working directory is not writable, abort.</p>');
            }
        }        
    }


    // makes the template if it doesn't exist
    function make_template_pdf($filename){
        	
		$this->pdf = new FPDI();
            
        $this->pdf->addPage();
        $this->pdf->SetFont('Arial','',18);
		$this->pdf->SetXY(10, 10);
		$this->pdf->Write(5,"Teste1");
        $this->pdf->Write(5,"Teste2");
        $this->pdf->SetXY(90, 260);
        $this->pdf->Write(5,"Signature: ");
        
        if(is_writable(dirname(__FILE__))){
            $this->pdf->Output($filename.'.pdf', 'F'); 
        }else{
            $this->pdf->Output($filename.'.pdf', 'I');
        }
		$this->pdf = NULL;        
         
    }
     
    
    // uses a template and places the signature
    function use_template_pdf($filename, $template){

		// if template doesn't exists makes it	
		if(!file_exists($template.'.pdf')){
			$this->make_template_pdf($template);	
		}
		
		$this->pdf = new FPDI();

        $pagecount = $this->pdf->setSourceFile($template.'.pdf');
        $tplidx = $this->pdf->importPage(1);
		
		$this->pdf->addPage();

        $this->pdf->useTemplate($tplidx, 10, 10);
        
        $this->pdf->Image($this->image,125,260,-200);
        
        if(is_writable(dirname(__FILE__))){
            $this->pdf->Output($filename.'.pdf', 'F'); 
        }else{
            $this->pdf->Output($filename.'.pdf', 'I');
        } 
		$this->pdf = NULL;      
         
    }
}

?>
