<?php
// Inclui arquivos essenciais
include 'includes/header.php'; 
include 'includes/footer.php'; 
include 'includes/menu.php'; 

// Carrega as folhas de estilo com controle dinâmico de cache
?>
<link rel="stylesheet" href="./style/header.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="./style/footer.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="./style/menu.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="./style/forms.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="./style/index.css?v=<?php echo time(); ?>">

<main class="welcome-container">
    <h1>Bem-vindo ao Petshop Gerência!</h1>
    <p>O lugar ideal para cuidar do seu amigo de quatro patas. Aqui, oferecemos os melhores serviços para garantir a saúde e felicidade do seu pet.</p>

    <section class="services">
        <h2>Nossos Serviços</h2>
        <ul>
            <li>Banho e Tosa</li>
            <li>Consultas Veterinárias</li>
            <li>Produtos de Higiene e Beleza</li>
            <li>Alimentos e Acessórios</li>
        </ul>
    </section>

    <section class="about">
        <h2>Por que escolher o Petshop Gerência?</h2>
        <p>Com uma equipe dedicada e apaixonada, garantimos o melhor cuidado para o seu pet. Venha nos visitar e descubra como podemos ajudar você e seu amigo!</p>
    </section>
</main>

<style>
    .welcome-container {
        text-align: center;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .services ul {
        list-style: none;
        padding: 0;
    }

    .services li {
        margin: 10px 0;
        font-size: 1.2em;
    }

    .about {
        margin-top: 20px;
    }
</style>















