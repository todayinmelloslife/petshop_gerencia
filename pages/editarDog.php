<?php include '../includes/header.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include '../includes/conexao.php'; ?>

<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/footer.css">
<link rel="stylesheet" href="../style/menu.css">
<link rel="stylesheet" href="../style/forms.css"> <!-- Link para o CSS -->

<main class="container">
  <h2>Editar Pato</h2>
  <?php
  if (isset($_GET['id'])) {
      $id = (int)$_GET['id'];
      $query = "SELECT * FROM caes WHERE id = $id";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
  ?>
  <form action="../actions/update_cao.php" method="POST" class="form-pet" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    <label for="nome">Nome do pato:</label>
    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>

    <label for="raca">Raça:</label>
    <input type="text" name="raca" id="raca" value="<?php echo htmlspecialchars($row['raca']); ?>" required>

    <label for="idade">Idade (em anos):</label>
    <input type="number" name="idade" id="idade" value="<?php echo htmlspecialchars($row['idade']); ?>" required min="0">

    <label for="dono">Nome do dono:</label>
    <input type="text" name="dono" id="dono" value="<?php echo htmlspecialchars($row['dono']); ?>" required>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" id="observacoes" rows="4"><?php echo htmlspecialchars($row['observacoes']); ?></textarea>

    <label for="foto">Foto do pato:</label>
    <input type="file" name="foto" id="foto" accept="image/*">
    <?php if (!empty($row['foto'])): ?>
      <p>Foto atual:</p>
      <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="Foto do Pato" style="width: 100px; height: auto;">
    <?php endif; ?>

    <label for="produto">Produto usado:</label>
    <select name="produto" id="produto" required>
      <option value="QuackPoo" <?php echo ($row['produto'] === 'QuackPoo') ? 'selected' : ''; ?>>QuackPoo (shampoo)</option>
      <option value="Saboneto" <?php echo ($row['produto'] === 'Saboneto') ? 'selected' : ''; ?>>Saboneto (sabonete líquido)</option>
      <option value="PataLimpinha" <?php echo ($row['produto'] === 'PataLimpinha') ? 'selected' : ''; ?>>PataLimpinha (sabonete em barra)</option>
      <option value="EspumaPluma" <?php echo ($row['produto'] === 'EspumaPluma') ? 'selected' : ''; ?>>EspumaPluma (sabonete espumante)</option>
      <option value="QuackBrilho" <?php echo ($row['produto'] === 'QuackBrilho') ? 'selected' : ''; ?>>QuackBrilho (condicionador)</option>
    </select>

    <button type="submit">Salvar Alterações</button>
  </form>
  <?php
      } else {
          echo "<p>Dog não encontrado.</p>";
      }
  } else {
      echo "<p>ID inválido.</p>";
  }
  ?>
</main>

<?php include '../includes/footer.php'; ?>
