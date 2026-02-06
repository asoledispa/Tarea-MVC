<h1>Catálogo de Productos</h1>
<a href="index.php?controller=producto&action=create">Crear Nuevo Producto</a>
<table border="1" style="width:100%; margin-top:20px;">
    <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>
    <?php while($row = $productos->fetch_object()): ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->nombre ?></td>
        <td>$<?= $row->precio ?></td>
        <td><?= $row->stock ?></td>
        <td>
            <a href="index.php?controller=producto&action=edit&id=<?= $row->id ?>">Editar</a> | 
            <a href="index.php?controller=producto&action=delete&id=<?= $row->id ?>" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>