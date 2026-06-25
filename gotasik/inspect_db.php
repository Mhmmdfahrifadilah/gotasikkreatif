<?php
require_once __DIR__ . '/db.php';
header('Content-Type: text/html; charset=utf-8');
echo "<h1>Inspect DB Tables</h1>";
echo "<p>Hapus file ini setelah digunakan untuk keamanan.</p>";
$res = $db->query('SHOW TABLES');
if (!$res) {
    echo '<p>Error: ' . htmlspecialchars($db->error) . '</p>';
    exit;
}
$tables = [];
while ($row = $res->fetch_row()) {
    $tables[] = $row[0];
}
if (empty($tables)) {
    echo '<p>No tables found.</p>';
    exit;
}
foreach ($tables as $t) {
    echo '<h2>Table: ' . htmlspecialchars($t) . '</h2>';
    $cols = $db->query('DESCRIBE `' . $db->real_escape_string($t) . '`');
    if ($cols) {
        echo '<h3>Columns</h3><ul>';
        while ($c = $cols->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($c['Field']) . ' &nbsp; ' . htmlspecialchars($c['Type']) . '</li>';
        }
        echo '</ul>';
        $cols->free();
    }
    $r = $db->query('SELECT * FROM `' . $db->real_escape_string($t) . '` LIMIT 5');
    if ($r) {
        echo '<h3>Sample rows (up to 5)</h3>';
        if ($r->num_rows === 0) {
            echo '<p><i>(no rows)</i></p>';
        } else {
            echo '<table border="1" cellpadding="6"><tr>';
            $finfo = $r->fetch_fields();
            foreach ($finfo as $f) echo '<th>' . htmlspecialchars($f->name) . '</th>';
            echo '</tr>';
            $r->data_seek(0);
            while ($row = $r->fetch_assoc()) {
                echo '<tr>';
                foreach ($row as $v) echo '<td>' . htmlspecialchars((string)$v) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        $r->free();
    }
}
echo '<p>Done.</p>';
