<?php

include "config.php";

  if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);
 
    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$message'") or die('query failed');
 
    if(mysqli_num_rows($select_message) > 0){
       $msg[] = 'message sent already!';
    }else{
       mysqli_query($conn, "INSERT INTO `message`(name, email, number, message) VALUES('$name', '$email', '$number', '$message')") or die('query failed');
       $msg[] = 'message sent successfully!';
    }
 }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altair Freire</title>
    <meta name="description" content="Salão de beleza e barbearia Altair Freire, temos uma diversidade de serviços como cortes de cabelos para homens e mulheres, escovas, penteados, Maquiagem, Mega Hair, Progressiva entre muitos outros outros, estamos localizados na cidade do Portp proximo a praça do Marques. ">
    <link rel="icon" type="image/x-icon" href="../Altair/img/logo-icon.ico">
    <link rel="stylesheet" href="../Altair/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--Map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="crossorigin=""></script>    
</head>
<body>
    <?php include 'header.php'; ?>
    <article>
        <div class="section-background" >      
                <img src="../Altair/img/logo.png" alt="" srcset="">
            <!--<div class="book">
                <a href=".home-contact">Agendamento</a>
            </div>-->      
        </div>   
    </article>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="../Altair/img/cortes/CM-1-2.jpg" alt="">
            </div> 

            <div class="content">
                <h3>Sobre</h3>
                <p>Já com mais de duas décadas de experiência na área, já tento exercido em França, Brasil e agora neste momento em Portugal na cidade do Porto, eu juntamente com a minha equipe temos orgulho de dizer que deixamos nossa marca na cidade do Porto.</p>
                <a href="missao.php" 
                   class="btn">Nossa Missão</a>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="flex">
            <div class="content">
                <h3>Porque nós?</h3>
                <p>Temos os mais diversos serviços de bela com os melhores produtos do mercados, juntamente com uma equipe especializada para atender aos seus objetivos</p>
                <p>Clique no botão abaixo para ver a nossa tabela de serviços</p>
                <a href="servicos.php" 
                    class="btn">Serviços</a>
            </div>
            <div class="image">
                <img src="../Altair/img/cortes/CF-0.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="reviews">
        <div class="box-container">
        <div class="box">
            <img src="../Altair/img/C1.png" alt="">
            <p> Muito bom, otimo atendimento e muito profissionais! </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
                <h3>Carla Souza</h3>
        </div>
        <div class="box">
            <img src="../Altair/img/C0.png" alt="">
            <p>Arrasa! Transformação total e perfeita, com apenas um simples corte de cabelo e um toque profissional !</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>S. Hallsted | DJ</h3>
        </div>
        <div class="box">
            <img src="../Altair/img/C2.png" alt="">
            <p> Arrasou no cabelo, adorei 👏👏👏👏👏 <br> Super indico !</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Luciana Freitas</h3>
            </div>
        </div>
    </section>

    <section class="cortes">
        <div class="box-container">
            <div class="box">
                <img src="../Altair/img/cortes/CF-2.png" alt="">
            </div>
            <div class="box">
                <img src="../Altair/img/cortes/CM-2-2.png" alt="">
            </div>
            <div class="box">
                <img src="../Altair/img/cortes/CM-1.png" alt="">
            </div>
            <div class="box">
                <img src="../Altair/img/cortes/CF-0-1.jpg" alt="">
            </div>
            <div class="box">
                <img src="../Altair/img/cortes/CF-0-2.jpg" alt="">
            </div>
            <div class="box">
                <img src="../Altair/img/cortes/CF-1-2.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="about">
        <div class="flex">
        <div class="content">
            <h3>Localização</h3>
            <p class="fas fa-map-marker"> Rua da Constituicao 621<br>4200-200 Porto</p><br>
            <p class="fa-solid fa-phone" <strong> +351 934 792 151 </strong> </a>  
            <p><strong>Horario</strong><br>Segunda-Sexta<br>10:00 às 20:00</p> 
        </div>
        <div id="map"></div>
        </div>
    </section>

    <section class="home-contact">
        <div class="content">
            <h3>Entre em contao conosco através do formulario abaixo !</h3><br>
        </div>
        <div class="contact">
            <form action="" method="post">
            <h3>Envie nós a sua requisição </h3>
                <input type="text" name="name" required placeholder="Seu nome" class="box">
                <input type="email" name="email" required placeholder="Seu email" class="box">
                <input type="number" name="number" required placeholder="Seu número de contacto" class="box">
                <textarea name="message" class="box" placeholder="Sua menssagem" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Envie" name="send" class="btn" placeholder="<?php echo"$msg";?>">
            </form>
        </div><br>
        <div class="content">
            <h3>Ou então, entre em contato direto conosco !</h3>
            <p>Entre em contato com nós através dos nosso contatos no roda pé do site ou através do nosso WhatsApp clicando no botão abaixo </p>
            <a href="https://api.whatsapp.com/send?phone=351919159773" 
               class="white-btn">WhatsApp</a>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <script src="script/map.js"></script>
</body>
</html>