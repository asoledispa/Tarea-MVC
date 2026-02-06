<h1>Nuevo Producto</h1>
<?php if(!empty($errores)) foreach($errores as $e) echo "<p style='color:red'>$e</p>"; ?>
<form action="index.php?controller=producto&action=store" method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Precio: <input type="number" step="0.01" name="precio" required><br>
    Stock: <input type="number" name="stock" required><br>
    <input type="submit" value="Guardar">
</form>