<?php include '../includes/header.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include '../includes/conexao.php'; ?>

<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/footer.css">
<link rel="stylesheet" href="../style/menu.css">
<link rel="stylesheet" href="../style/forms.css">
<link rel="stylesheet" href="../style/style.css">

<main class="container">
  <h2>Cadastro de Pato</h2>

  <form action="../actions/insert_cao.php" method="POST" class="form-pet" enctype="multipart/form-data">
    <label for="nome">Nome do pato:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="raca">Raça:</label>
    <input type="text" name="raca" id="raca" required>

    <label for="idade">Idade (em anos):</label>
    <input type="number" name="idade" id="idade" required min="0">

    <label for="dono">Nome do dono:</label>
    <input type="text" name="dono" id="dono" required>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" id="observacoes" rows="4" placeholder="Alergias, temperamento, etc."></textarea>

    <label for="foto">Foto do pato:</label>
    <input type="file" name="foto" id="foto" accept="image/*" required>

    <label for="produto">Produto usado:</label>
    <select name="produto" id="produto" required>
      <option value="QuackPoo">QuackPoo (shampoo)</option>
      <option value="Saboneto">Saboneto (sabonete líquido)</option>
      <option value="PataLimpinha">PataLimpinha (sabonete em barra)</option>
      <option value="EspumaPluma">EspumaPluma (sabonete espumante)</option>
      <option value="QuackBrilho">QuackBrilho (condicionador)</option>
    </select>

    <button type="submit">Cadastrar</button>
  </form>
</main>

<?php include '../includes/footer.php'; ?>
