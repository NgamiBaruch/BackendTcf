<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Sujets</title>
</head>
<body>
    <h1>Liste des Sujets</h1>
    <table border="1">
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($sujets as $sujet): ?>
            <tr>
                <td><?php echo $sujet['numero']; ?></td>
                <td><?php echo $sujet['nom']; ?></td>
                <td>
                    <a href="index.php?action=update&numero=<?php echo $sujet['numero']; ?>">Modifier</a> |
                    <a href="index.php?action=delete&numero=<?php echo $sujet['numero']; ?>">Supprimer</a> |
                    <a href="index.php?action=showQuestions&numero=<?php echo $sujet['numero']; ?>">Voir Questions</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?action=create">Ajouter un sujet</a>
</body>
</html>
