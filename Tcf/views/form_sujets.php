<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($sujet) ? 'Modifier' : 'Ajouter'; ?> un Sujet</title>
</head>
<body>
    <h1><?php echo isset($sujet) ? 'Modifier' : 'Ajouter'; ?> un Sujet</h1>
    <form method="post" action="index.php?action=<?php echo isset($sujet) ? 'update' : 'create'; ?>">
        <label>Nom:</label>
        <input type="text" name="nom" value="<?php echo isset($sujet['nom']) ? $sujet['nom'] : ''; ?>">
        <?php if (isset($sujet)): ?>
            <input type="hidden" name="numero" value="<?php echo $sujet['numero']; ?>">
        <?php endif; ?>
        <button type="submit"><?php echo isset($sujet) ? 'Modifier' : 'Ajouter'; ?></button>
    </form>
</body>
</html>
