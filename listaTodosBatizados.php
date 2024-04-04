<?php

$todos = isset($_POST['listar']) ? $_POST['listar'] : '';
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 15;
    $offset = ($limit * $page) - $limit;

$sql5 = "SELECT * FROM Cad_Children";
            $resultado5 = mysqli_query($conn, $sql5);
            $total_linhas = mysqli_num_rows($resultado5);
            $sql = "SELECT * FROM Cad_Children LIMIT $limit OFFSET $offset ORDER  BY Nome ASC";
            $res = mysqli_query($conn, $sql);
            $registros = mysqli_num_rows($res);
?>

<div class="tabela">
            <table>
                <tr>
                    <th>Criança</th>
                    <th>Nascimento</th>
                    <th>Cert. Nasc.</th>
                    <th>Data do Curso</th>
                    <th>Data de Batismo</th>
                    <th>Cadastro</th>
                    <th>Certificados</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                    <tr>
                        <td><?php echo $row['Nome']; ?></td>
                        <td><?php echo $row['Nascimento']; ?></td>
                        <td><?php echo $row['cert_nasc']; ?></td>
                        <td><?php echo $row['curso']; ?></td>
                        <td><?php echo $row['Batizado']; ?></td>
                        <td>
                            <a href="visualizarDados.php?Id=<?php echo $row['Id'] ?>"><span title="Visualizar"><img src="img/view.png"></span></a>
                            <a href="editabat.php?Id=<?php echo $row['Id']; ?>"><span title="Editar"><img src="img/edit.png"></span></a>
                        </td>
                        <td>
                            <a href="certcursopdf.php?Id=<?php echo $row['Id']; ?>">(Curso)</a>
                            <a href="gerapdfbatismo.php?Id=<?php echo $row['Id']; ?>">(Batismo)</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <br>
            <td>Número de Registros desta página: <?php echo "$registros"; ?></td><br>
            <hr>
            <td>Total Cadastrado: <?php echo "$total_linhas"; ?></td>
            <hr>

        </div>

        <?php
        $pages = ceil($total_linhas / $limit);
        $MaxLinks = 2;

        ?>
        <!-- Paginação -->
        <div class="pages" style="text-align: center;  font-size: large;">
            Páginas: <br> <a href="?page=1"><< </a>

                    <?php for ($i = $page - $MaxLinks; $i <= $page - 1; $i++) : ?>
                        <?php if ($i > 0) : ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php echo $page; ?>

                    <?php for ($i2 = $page + 1; $i2 <= $page + $MaxLinks; $i2++) : ?>
                        <?php if ($i2 <= $pages) : ?>
                            <a href="?page=<?php echo $i2; ?>"><?php echo $i2; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <a href="?page=<?php echo $pages; ?>"> >></a>
                    <hr>
        </div>
