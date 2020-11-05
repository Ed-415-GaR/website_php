<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<title>Edgar Almada | O meu site</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
<div class="header">
    <div class="container">
         <!-- barra navegação -->
        
            <div class = "navbar">
                <h1 id = "sobremim">Edgar Almada</h1>
                <nav>
                    <ul>
                        <li><a href="#sobremim" class = "navegacao-bar">Sobre mim</a></li>
                        <li><a href="#projeto" class = "navegacao-bar">Projetos</a></li>
                        <li><a href="#contacto" class = "navegacao-bar">Contacto</a></li>
                    </ul>
                </nav>
            </div>

        
        <div class="row">
            <div class="col-2">
              <h1>Bem-Vindo à minha página</h1><br>
              <p>Olá, Meu nome é Edgar Marques Almada e sou licenciado em engenharia informática.</p><br>
              <p>Desde de criança sempre gostei de computadores e ao longo dos anos foi desenvolvendo cada vez mais o interesse que tenho por eles.</p><br>
              <p>Considero-me uma pessoa trabalhadora e dedicada.</p><br>
              <p>Nos meus tempos livres gosto de reparar computadores/telemóveis, ver Fórmula 1 e estar com os amigos.</p>  
              <a href="Edgar_Almada_CV.pdf" download><button class = "btn"><i class="fas fa-link"></i> Meu CV </button></a>
            </div>
            
            <div class="col-2">
                <img src="imagens/projetos-de-programação-676x451.jpg">
            </div>
        </div>
    
    </div>
</div>


<div class="header-projeto">
    <div class = "projetos-titulo">
        <h2 id = "projeto">Projetos</h2>
    </div>

        <div class="row-projeto">
                <div class="col-3-projeto">
                    <img src="imagens/lampada-magica.png">
                    <div class = "projeto-descricao">
                        <h3>AladinoLamp</h3>
                        <p>É um projeto de uma lâmpada inteligente com sensor de temperatura controlada por smartphone ou PC.</p><br>
                        <p><b>Cadeira</b></p>
                        <p>Processos e Métricas de Software</p><br>
                        <a href="http://aladinoslamp.eu.org/" target = "_blank"><button class = "btn-projeto"><i class="fas fa-link"></i> Website</button></a>
                    </div>
                </div>
                <div class="col-3-projeto">
                    <img src="imagens/lampada.png">
                
                    <div class = "projeto-descricao">
                        <h3>MaxLamp</h3>
                        <p>Prótotipo de um site (front-end) para gestão de painéis fotovoltaicos e baterias.</p><br>
                        <p><b>Cadeira</b></p>
                        <p>Engenharia de Requisitos</p>
                        <p class = "projeto-academico">(Projeto Académico)</p><br>
                        <a href="https://bestmaxamp.netlify.app/" target = "_blank"><button class = "btn-projeto"><i class="fas fa-link"></i> Website</button></a>
                    </div>
                </div>
                <div class="col-3-projeto">
                    <img src="imagens/form.png">
                    <div class = "projeto-descricao">
                        <h3>Desenvolvimento de uma Base de Dados</h3>
                        <p>Uma base de dados dinâmica em que os utilizadores podem definir as tabelas, sendo que o formulário que permite inserção de tuplos (valores).</p></br>
                        <p><b>Cadeira</b></p>
                        <p>Sistemas Gestores Base de Dados</p><br>
                        <a href="https://github.com/Ed-415-GaR/Base_Dados.git" target = "_blank"><button class = "btn-projeto"><i class="fab fa-github"></i> Repositório</button></a>
                    </div>
                </div>

        </div>


</div>

<div class="header2">
    <div class="contacto-titulo">
        <h2 id = "contacto">Contacto</h2>
    </div>
        <div class="contacto-formu">
            <form id="contacto-form" method="post">
                <br><input type="text" name="Nome" class= "form-control" placeholder="Introduza o seu nome" required><br>
                <br><input type="text" name="assunto" class= "form-control" placeholder="Insira o assunto da mensagem" required><br>
                <br><input type="email" name="email" class= "form-control" placeholder="Introduza o seu e-mail" required><br>
                
                <br><textarea name = "mensagem" class = "form-control" rows="7 " placeholder="Introduza a sua mensagem" required></textarea><br>
                
                <div class="g-recaptcha" data-sitekey="6LcSfd0ZAAAAACwqTxNckbYyh3_BZF_q7uK0-tpA"></div>
                <input type="submit" name = "submit" class = "form-control-submit" value="Enviar Mensagem"><br><br>
            </form>
             
            <?php 
            if(isset($_POST['submit']))
            {
                $nome = $_POST['Nome'];
                $assunto = $_POST['assunto'];
                $mail_user = $_POST['email'];
                $mensagem = $_POST['mensagem'];

                $email_from = "noreply@edgaralmada.com";
                $email_assunto = "Novo contacto";
                $email_mensagem = "Nome: .$nome.\n".
                                  "Assunto: .$assunto.\n".
                                  "E-mail: .$mail_user.\n".
                                  "Mensagem: $mensagem.\n";

                $email_to = "edgar.almada154@gmail.com";
                $headers = "From: $email_from \n";
                $headers .= "Reply-to: $mail_user\n";

                $secretKey = "6LcSfd0ZAAAAALZTdQ6e934WEainLCkBoXk-u9AV";
                $responseKey = $_POST['g-recaptcha-response'];
                $UserIp = $_SERVER['REMOTE_ADDR'];

                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIp";

                $response = file_get_contents($url);
                $response = json_decode($response);

                if($response->success)
                {
                    mail($email_to, $email_assunto, $email_mensagem, $headers);
                    echo " Mensagem enviada com sucesso";
                }
                else
                {
                   echo "<span>Captcha inválido</span>"; 
                }
            }
            
            ?>
                <div class="contacto-rapido">
                    <p>Pode contactar também por:</p><br>
                </div>
        </div>

        
            <div class="row-contacto">
                <!-- <div class="col-3">
                    <a href="" class = ""><img src="imagens/Outlook.com-Logo.wine.png"></a>
                </div> -->
                <div class="col-3">
                    <a href="https://www.facebook.com/profile.php?id=100008180777610" target = "_blank" class = ""><img src="imagens/facebook-messenger-logo.png"></a>
                </div>
                <div class="col-3">
                    <a href="https://mail.google.com/mail/?view=cm&source=mailto&to=edgar.almada154@gmail.com" target = "_blank" class = ""><img src="imagens/gmail-logo-3.png"></a>
                    
                </div>

            </div>
        
</div>



<div class="irtopo">
    <a href="#sobremim"class = ""><img src="imagens/chevron2.png"></a>
<!--<i class="fas fa-chevron-up"></i>-->
</div>
<div class="rodape">
    <footer>&copy;2020 Edgar Almada</footer>
</div>

</body>
</html>


