<?php
$result = null;

if (isset($_POST['matrix'])) {
    $m = $_POST['matrix'];
    
    $a = $m[0][0]; $b = $m[0][1]; $c = $m[0][2];
    $d = $m[1][0]; $e = $m[1][1]; $f = $m[1][2];
    $g = $m[2][0]; $h = $m[2][1]; $i = $m[2][2];

    $det = $a * ($e * $i - $f * $h) 
         - $b * ($d * $i - $f * $g) 
         + $c * ($d * $h - $e * $g);
         
    $result = "Детерминант: $det";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Determinant</title>
</head>
<body>
    <h2>Введите матрицу 3x3</h2>
    <form method="POST">
        <table>
        <?php for ($i = 0; $i < 3; $i++): ?>
            <tr>
            <?php for ($j = 0; $j < 3; $j++): ?>
                <td>
                    <input type="number" step="any" name="matrix[<?= $i ?>][<?= $j ?>]" value="0" required>
                </td>
            <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </table>
        <br>
        <button type="submit">Вычислить</button>
    </form>

<?php if ($result): ?>
    <h3><?= $result ?></h3>
<?php endif; ?>
</body>
</html>