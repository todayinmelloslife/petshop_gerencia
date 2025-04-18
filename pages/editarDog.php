<?php include '../includes/header.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include '../includes/conexao.php'; ?>

<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/footer.css">
<link rel="stylesheet" href="../style/menu.css">

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
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="nome">Nome do pato:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" required>

    <label for="raca">Raça:</label>
    <input type="text" name="raca" id="raca" value="<?php echo $row['raca']; ?>" required>

    <label for="idade">Idade (em anos):</label>
    <input type="number" name="idade" id="idade" value="<?php echo $row['idade']; ?>" required min="0">

    <label for="dono">Nome do dono:</label>
    <input type="text" name="dono" id="dono" value="<?php echo $row['dono']; ?>" required>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" id="observacoes" rows="4"><?php echo $row['observacoes']; ?></textarea>

    <label for="foto">Foto do pato:</label>
    <input type="file" name="foto" id="foto" accept="image/*">

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
