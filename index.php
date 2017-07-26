


<?php

$enviar= 'style="display:block"';

$enviar2= 'style="display:none"';

if(isset($_POST['voltar'])){

  $enviar= 'style="display:block"';
  $enviar2= 'style="display:none"';  
}



if(isset($_POST['sign']) && $_POST['sign'] != '' && isset($_POST['img']) && $_POST['img'] != ''){
    
    require('signature.class.php');

    $s = new signature;
	
    /*
     * makes a pdf with signature with the given filename, using an existing pdf as template    
     * parameters: filename to be produced, template pdf to be used
     */     
    $s->use_template_pdf('output','template'); //
    
    /*
     * DO NOT FORGET TO DELETE THE SIGNATURE (IMAGE)  
     */ 
        
     $s->delete_signature(); 
     
     // some feedback
     $msg = '<h3></h3>';
	 $signImage = $_POST['sign']; 


    $enviar= 'style="display:none"';
    $enviar2= 'style="display:block"';


    $aluno = 'thiago_braga';
    $cpf = '123456789';

    $alunoSign = $aluno.$cpf;
    define('UPLOAD_DIR', 'images/');
    $img = $_POST['sign'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = UPLOAD_DIR . $alunoSign . '.png';
    $success = file_put_contents($file, $data);
    //$success ? $file : 'Unable to save the file.';


    }

?>

<html>
    <head>
<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="../public/dist/css/font-awesome.min.css">

<link rel="stylesheet" href="../public/dist/css/ionicons.min.css">

    <link href="../public/dist/css/jquery.contextMenu.min.css" rel="stylesheet">


    <script src="../public/dist/js/jquery.contextMenu.min.js"></script>

 <script src="../public/asset/js/jquery.ui.position.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
        
    </head>
    <body>

    
                            
                               <div class="col-md-12" style="text-align: center;">
                                
                                <h1>CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS</h1>
                                        
                                </div>
                                
                               
                                <div class="col-md-12" style="text-align: center;">

                                <h3>CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS</h3>

                                <br></div>

                               
                                

                                
    
    <div class="col-md-12">
    
    <table class="table">
    <tbody>
        <tr>
          <th>CONTRATANTE:</th>
            <td>(Nome), (nacionalidade), (estado civil), (profissão), portador da cédula de identidade R.G. nº xxxxxxx e CPF/MF nº xxxxxx, residente e domiciliado na (Rua), (número), (bairro), (CEP), (Cidade), (Estado);</td>
          
        </tr>
        <tr>
          <th>CONTRATADA:</th>
            <td>(Razão social), com sede na (Rua), (número), (bairro), (CEP), (Cidade), (Estado), inscrita no CNPJ sob o nº xxxxx, e no Cadastro Estadual sob o nº xxxxx, neste ato representada pelo senhor (Nome), (nacionalidade), (estado civil), (profissão), portador da cédula de identidade R.G. nº xxxxx e CPF/MF nº xxxxxx, residente e domiciliado na (Rua), (número), (bairro), (CEP), (Cidade), (Estado).</td>
            
        </tr>
        <tr>
          <th></th>

          <td>As partes acima acordam com o presente Contrato de Prestação de Serviços Educacionais, que se regerá pelas cláusulas seguintes:</td>
           
        </tr>
      <tr>
          <th></th>
            <td><h4><strong>DO OBJETO DO CONTRATO</strong></h4></td>
           
        </tr>

        <tr>
          <th>Cláusula 1ª.</th>
            <td>O OBJETO do presente instrumento é a prestação de serviços educacionais, pela CONTRATADA, sendo os mesmos prestados na Escola (Nome), localizada na (Rua), (número), (bairro), (CEP), (Cidade), (Estado), para o ano letivo de (ano), em favor de (Nome), representado neste instrumento pelo CONTRATANTE.</td>
           
        </tr>

        <tr>
          <th>CONTRATADA:</th>
            <td>(Razão social), com sede na (Rua), (número), (bairro), (CEP), (Cidade), (Estado), inscrita no CNPJ sob o nº xxxxx, e no Cadastro Estadual sob o nº xxxxx, neste ato representada pelo senhor (Nome), (nacionalidade), (estado civil), (profissão), portador da cédula de identidade R.G. nº xxxxx e CPF/MF nº xxxxxx, residente e domiciliado na (Rua), (número), (bairro), (CEP), (Cidade), (Estado).</td>
           
        </tr>

        <tr>
          <th>CONTRATADA:</th>
            <td>(Razão social), com sede na (Rua), (número), (bairro), (CEP), (Cidade), (Estado), inscrita no CNPJ sob o nº xxxxx, e no Cadastro Estadual sob o nº xxxxx, neste ato representada pelo senhor (Nome), (nacionalidade), (estado civil), (profissão), portador da cédula de identidade R.G. nº xxxxx e CPF/MF nº xxxxxx, residente e domiciliado na (Rua), (número), (bairro), (CEP), (Cidade), (Estado).</td>
           
        </tr>
    </tbody>
</table></div>

                                <div class="col-md-12">(Local, data e ano).<hr>

                                </div>

                                <div class="col-md-12">(Nome e assinatura do Contratante)<hr>

                                </div>

                                <div class="col-md-12">(Nome e assinatura da Contratada)<hr>

                                </div>

                                <div class="col-md-12">(Nome, RG Testemunha)<hr>

                                </div>

                                <div class="col-md-12">(Nome, RG Testemunha)<hr>

                               </div>

        <div class="col-md-12">

        <div class="col-md-6 "><p></p><img src="images/contratante.png" width="680em" alt=""></div>


        <div class="col-md-6" <?php echo $enviar2 ?> >          
        <?php 

        //if(isset($msg)) echo($msg);  
        if(isset($signImage)) {

            echo('<img src="'.$_POST['sign'].'";/>');

            }
                
        ?> 
        </div>


        
        <div <?php echo $enviar ?> class="col-md-6 pull-right" id="signature"></div> 

    
        <form class="form-inline" action="?" id="f" method="post">

         <div class="form-group"> 

        <input type="hidden" name="sign" id="sign" />
        
    
        </div>


        <div class="form-group">
        <input type="hidden" name="img" id="img" />
             
        <br>

             </div>

             <div class="col-md-12">
                 
             <div class="col-md-6" style="padding-left: 23em; ">Diretor</div>

         <div class="col-md-6" style="padding-left: 23em; ">Thiago Braga</div>

         </div>

        <!--Botoes-->

         <div class="col-md-12">

        <div <?php echo $enviar ?> class="form-group pull-right" style="padding-right: 30px; ">
            <button  class="btn btn-primary" type="button"  onclick="signature()"><i class='fa fa-check fa-x2'></i></button>

            <br>

        </div>

        <div <?php echo $enviar2 ?> class="form-group pull-right" style="padding-right: 30px; ">
            <button type="submit" class="btn btn-primary" type="button"  name="voltar"><i class='fa fa-arrow-left fa-x2'></i></button>

            <br><br>
        </div>

        

        <div <?php echo $enviar2 ?> class="form-group pull-right" style="padding-right: 10px;  padding-bottom: 15px">
        <button class="btn btn-success" id="button" type="button"><i class="fa fa-file fa-x2"></i></button>
        
         <br>
        </div>

       

         <div <?php echo $enviar ?> class="form-group pull-right" style="padding-right: 10px;  padding-bottom: 15px">
        <button class="btn btn-danger" id="reset" name="reset" type="button"><i class="fa fa-close fa-x2"></i></button>
        
         <br><br>
        </div>
        
       

        </div>
        

        </div>

     
        
        </form>
        
        
           

        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="flashcanvas.js"></script>
        <![endif]-->
        <script src="jSignature.min.js"></script>
       
    
        <script>
            $(document).ready(function() {
                $("#signature").jSignature()
            })

            $('#reset').click(function() {
            $('#signature').jSignature('reset');
            });
            function signature(){
                var $sigdiv = $("#signature");
                var datax = $sigdiv.jSignature("getData"); // for embedding is html page
                $('#sign').val(datax);
                var datax = $sigdiv.jSignature("getData","image"); // for creating image
                $('#img').val(datax);
                $sigdiv.jSignature("reset")
                $('#f').submit();
            }
        </script>    
    
    </body>
</html>