import pathlib
import re

root = pathlib.Path('.')
html_files = sorted(root.glob('*.html'))
for html in html_files:
    text = html.read_text(encoding='utf-8')
    text = text.replace('.html"', '.php"')
    text = text.replace('.html\'', '.php\'')
    text = text.replace('.html>', '.php>')
    if '<!DOCTYPE html>' in text and '<?php' not in text:
        text = text.replace('<!DOCTYPE html>', '<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?>', 1)
    new_path = html.with_suffix('.php')
    new_path.write_text(text, encoding='utf-8')
    html.unlink()
    print(f'Renamed {html.name} to {new_path.name}')
print('Done')
