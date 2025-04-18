<?php include '../includes/header.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include '../includes/conexao.php'; ?>

<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/footer.css">
<link rel="stylesheet" href="../style/menu.css">
<link rel="stylesheet" href="../style/table.css">

<main class="container">
  <h2>Lista de Patos</h2>
  <a href="cadastroDog.php" class="btn">Cadastrar Novo Pato</a> <!-- Button to navigate to cadastroDog.php -->
  <table border="1" class="dog-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Dono</th>
        <th>Observações</th>
        <th>Foto</th>
        <th>Produto</th> <!-- New column for product -->
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Fetch data from the 'caes' table
      $query = "SELECT * FROM caes";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['id']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
              echo "<td>" . htmlspecialchars($row['raca']) . "</td>";
              echo "<td>" . htmlspecialchars($row['idade']) . "</td>";
              echo "<td>" . htmlspecialchars($row['dono']) . "</td>";
              echo "<td>" . htmlspecialchars($row['observacoes']) . "</td>";
              echo "<td>";
              if (!empty($row['foto'])) {
                  echo "<img src='" . htmlspecialchars($row['foto']) . "' alt='Foto do Pato' style='width: 100px; height: auto;'>";
              } else {
                  echo "Sem foto";
              }
              echo "</td>";
              echo "<td>" . htmlspecialchars($row['produto']) . "</td>"; // Display product
              echo "<td>
                      <a href='../actions/delete_cao.php?id=" . htmlspecialchars($row['id']) . "' class='btn-delete'>Excluir</a>
                      <a href='editarDog.php?id=" . htmlspecialchars($row['id']) . "' class='btn-edit'>Editar</a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='9'>Nenhum pato cadastrado.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</main>

<?php include '../includes/footer.php'; ?>
