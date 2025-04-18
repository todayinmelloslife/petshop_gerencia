<?php include '../includes/header.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include '../includes/conexao.php'; ?>

<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/footer.css">
<link rel="stylesheet" href="../style/menu.css">
<link rel="stylesheet" href="../style/forms.css">

<main class="container">
  <h2>Dashboard</h2>
  <form method="GET" action="dashboard.php" class="form-pet">
    <label for="search">Pesquisar por nome do pato:</label>
    <input type="text" id="search" name="search" placeholder="Digite o nome do pato" oninput="filterDucks()">
  </form>

  <div id="duck-info" style="margin-top: 20px;">
    <!-- Informações do pato selecionado aparecerão aqui -->
  </div>
</main>

<script>
  const ducks = [
    { nome: 'Pato Normal', produto: 'Shampoo' },
    { nome: 'Pato Banho', produto: 'Sabonete' },
    // Adicione mais patos e produtos aqui
  ];

  function filterDucks() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const duckInfoDiv = document.getElementById('duck-info');

    const filteredDuck = ducks.find(duck => duck.nome.toLowerCase().includes(searchInput));

    if (filteredDuck) {
      duckInfoDiv.innerHTML = `<p>O pato <strong>${filteredDuck.nome}</strong> usa o produto <strong>${filteredDuck.produto}</strong>.</p>`;
    } else {
      duckInfoDiv.innerHTML = '<p>Nenhum pato encontrado.</p>';
    }
  }
</script>

<?php include '../includes/footer.php'; ?>