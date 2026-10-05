import subprocess
from PIL import Image, ImageDraw, ImageFont
import os

def render_terminal_image(title: str, text: str, output_path: str, max_lines: int = 65):
    lines = text.strip().split('\n')
    if len(lines) > max_lines:
        lines = lines[:max_lines]

    font_path = "C:\\Windows\\Fonts\\consola.ttf"
    if not os.path.exists(font_path):
        font_path = "C:\\Windows\\Fonts\\lucon.ttf"
    
    font_size = 13
    try:
        font = ImageFont.truetype(font_path, font_size)
    except:
        font = ImageFont.load_default()

    char_w = 7.8
    line_h = 18
    pad_x = 24
    pad_top = 45
    pad_bottom = 20

    max_len = max(len(l) for l in lines) if lines else 80
    width = int(max(max_len * char_w + pad_x * 2, 800))
    height = int(len(lines) * line_h + pad_top + pad_bottom)

    img = Image.new("RGB", (width, height), color=(30, 30, 30))
    draw = ImageDraw.Draw(img)

    # Top title bar
    draw.rectangle([(0, 0), (width, 35)], fill=(45, 45, 45))
    # Window buttons
    draw.ellipse([(12, 12), (24, 24)], fill=(255, 95, 86))
    draw.ellipse([(32, 12), (44, 24)], fill=(255, 189, 46))
    draw.ellipse([(52, 12), (64, 24)], fill=(39, 201, 63))

    # Title text
    draw.text((80, 10), title, fill=(200, 200, 200), font=font)

    # Content lines
    y = pad_top
    for line in lines:
        color = (220, 220, 220)
        if "===" in line or "---" in line:
            color = (100, 149, 237)
        elif ">>>" in line or "[+]" in line:
            color = (120, 220, 120)
        elif "PROGRAM STUDI" in line or "Fakultas :" in line:
            color = (255, 215, 0)
        elif "No " in line and "NIK" in line:
            color = (255, 165, 0)
        
        draw.text((pad_x, y), line, fill=color, font=font)
        y += line_h

    os.makedirs(os.path.dirname(output_path), exist_ok=True)
    img.save(output_path)
    print(f"Saved: {output_path}")

# (C++ and Python screenshot documentations use user's actual terminal capture)

# Run Java
res_java = subprocess.run(["java", "-cp", "Java/Program", "Main"], capture_output=True, text=True, cwd=".")
java_out = res_java.stdout

def split_stages(out_text):
    parts = out_text.split("PROSES PENAMBAHAN DATA ENTITAS BARU")
    if len(parts) == 2:
        part1 = parts[0]
        part2 = "===============================================================================================\nPROSES PENAMBAHAN DATA ENTITAS BARU" + parts[1]
        return part1, part2
    return out_text, out_text

java_s1, java_s2 = split_stages(java_out)

render_terminal_image("Java Terminal - Data Awal (Sebelum Penambahan)", java_s1, "Java/Dokumentasi/java_sebelum.png")
render_terminal_image("Java Terminal - Penambahan & Data Akhir (Sesudah Penambahan)", java_s2, "Java/Dokumentasi/java_sesudah.png")
render_terminal_image("Java Terminal - Output Lengkap Eksekusi", java_out, "Java/Dokumentasi/java_demo.png", max_lines=120)
