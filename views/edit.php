<h1>Editar Producto</h1>
<?php if(!empty($errores)) foreach($errores as $e) echo "<p style='color:red'>$e</p>"; ?>
<form action="index.php?controller=producto&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $p->id ?>">
    Nombre: <input type="text" name="nombre" value="<?= $p->nombre ?>" required><br>
    Descripción: <textarea name="descripcion"><?= $p->descripcion ?></textarea><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?= $p->precio ?>" required><br>
    Stock: <input type="number" name="stock" value="<?= $p->stock ?>" required><br>
    <input type="submit" value="Actualizar">
</form>