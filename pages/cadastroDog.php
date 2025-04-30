<?php include '../includes/header.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include '../includes/conexao.php'; ?>

<link rel="stylesheet" href="../style/header.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="../style/footer.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="../style/menu.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="../style/forms.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="../style/style.css?v=<?php echo time(); ?>">

<main class="container">
  <h2>Cadastro de Pato</h2>

  <form action="../actions/insert_cao.php" method="POST" class="form-pet" enctype="multipart/form-data">
    <label for="nome">Nome do pato:</label>
    <input type="text" name="nome" id="nome" placeholder="Ex: Patolino" required>

    <label for="raca">Raça:</label>
    <input type="text" name="raca" id="raca" placeholder="Ex: Pato Real" required>

    <label for="idade">Idade (em anos):</label>
    <input type="text" name="idade" id="idade" placeholder="Ex: 2" required>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone" placeholder="Ex: (11) 98765-4321" required>

    <label for="dono">Nome do dono:</label>
    <input type="text" name="dono" id="dono" placeholder="Ex: John Doe" required>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" id="observacoes" rows="4" placeholder="Ex: Alergias, temperamento, etc."></textarea>

    <label for="foto">Foto do pato:</label>
    <input type="file" name="foto" id="foto" accept="image/*" required>

    <label for="produto">Produto usado:</label>
    <select name="produto" id="produto" required>
      <option value="QuackPoo">QuackPoo (shampoo)</option>
      <option value="Saboneto">Saboneto (sabonete líquido)</option>
      <option value="PataLimpinha">PataLimpinha (sabonete em barra)</option>
      <option value="EspumaPluma">EspumaPluma (sabonete espumante)</option>
      <option value="QuackBrilho">QuackBrilho (condicionador)</option>
      <option value="SuperQuacker">SuperQuack (Shampoo Anti-Caspa)</option>
    </select>

    <button type="submit">Cadastrar</button>
  </form>
</main>

<script>
  document.getElementById('nome').addEventListener('keypress', function(event) {
    if (!/^[a-zA-ZÀ-ÿ\s]*$/.test(event.key)) {
      event.preventDefault();
    }
  });

  document.getElementById('raca').addEventListener('keypress', function(event) {
    if (!/^[a-zA-ZÀ-ÿ\s]*$/.test(event.key)) {
      event.preventDefault();
    }
  });

  document.getElementById('telefone').addEventListener('input', function(event) {
    let value = this.value.replace(/\D/g, '');
    value = value.replace(/(\d{2})(\d)/, '($1) $2');
    value = value.replace(/(\d{4,5})(\d{4})$/, '$1-$2');
    this.value = value;
  });

  const idadeInput = document.getElementById('idade');
  idadeInput.type = 'text';
  idadeInput.addEventListener('keypress', function(event) {
    if (!/\d/.test(event.key)) {
      event.preventDefault();
    }
  });
  idadeInput.addEventListener('input', function(event) {
    this.value = this.value.replace(/\D/g, '');
    if (parseInt(this.value) > 100) {
      this.value = '100';
    }
  });
</script>

<?php include '../includes/footer.php'; ?>
