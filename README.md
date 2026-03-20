### What is this project?

just trying neon database (postgres) with laravel multi tenant and vercel (No code, using antigravity)

### Notes:

## 1. Kurang bagus untuk routing
Weaknessnya banyak, sudah coba generate buat solusi
``` 
Symfony\Component\Routing\Exception\RouteNotFoundException
vendor\laravel\framework\src\Illuminate\Routing\UrlGenerator.php:528
Route [central.dashboard] not defined.
```
yang seharusnya cuma tambahin route di web.php tapi dia bolak balik hampir 10 menit namain central.landing di codenya dan command (Commandnya di buat ulang mulu jadi terlihat changesnya banyak, padahal ga ada perubahan)

## 2. Kode kaku

Sudah coba minta buatkan UI, bagus hasilnya. Tapi secara struktur kacau balau sehingga susah untuk di kembangkan lagi oleh developer lain, alhasil dependency kepada AI bisa meroket seiring berjalannya waktu

### Final Verdict..
Jujur ini harusnya kalau nonton di yutub bisa lebih cepat kalau buat manual, tapi AI ini susah untuk buat struktur yang bagus

Sooo no.. its not good.. 
Don't use low code for big project