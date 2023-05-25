## Janji
Saya Ananda Myzza Marhelio NIM 2100702 mengerjakan soal TP3 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Deskripsi Tugas Praktikum 3 DPBO 2023
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:
* Program bebas, kecuali program Ormawa
* Menggunakan minimal 3 buah tabel
* Terdapat proses Create, Read, Update, dan Delete data
* Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
* Menggunakan template/skin form tambah data dan ubah data yang sama
* 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
* Menggunakan template/skin tabel yang sama untuk menampilkan tabel

## Desain Program
![Screenshot 2023-05-24 210455](https://github.com/anandamyzza/TP3DPBO2023/assets/100767177/ef3638ad-2b96-49b6-8481-54fc66da4ffa)

Terdapat tiga tabel pada database di program ini, yaitu:
1. **Tabel Album** memiliki 6 atribut dengan album_id sebagai primary_key nya. Tabel ini berfungsi untuk menyimpan data-data album para penyanyi, di mana pengguna bisa memasukan lima data lainnya. Tabel ini memiliki relasi dengan tabel **Artist** dengan artist sebagai foreign_key nya dan tabel **Genre** dengan genre sebagai foreign_key nya. Hubungan yang dimiliki adalah __Many to One__.
2. **Tabel Artist** memiliki 2 atribut dengan artist_id sebagai primary_keynya, dan artist_name untuk menampung nama penyanyi. Tabel ini memiliki hubungan __One to Many__ dengan tabel **Album**.
3. **Tabel Genre** memiliki 2 atribut dengan genre_id sebagai primary_keynya, dan genre_name untuk menampung genre musik yang ada. Tabel ini memiliki hubungan __One to Many__ dengan tabel **Album**.

## Alur Program
1. Pengguna akan dihadapkan dengan halaman utama yaitu **Home**, di mana halaman ini menampilkan daftar album yang terdaftar pada database. Pengguna bisa menggunakan navbar untuk pindah ke halaman lain seperti **Add Album**, **Artists**, **Genres**. Di halaman ini juga, pengguna bisa mencari judul album menggunakan field search yang tersedia, pengguna juga bisa melakukan sorting data menggunakan opsi yang terletak di sebelah field search.
2. Jika pengguna menekan tombol **Add Album** pada navbar, pengguna akan dihadapkan dengan halaman form untuk menambahkan data album baru.
3. Jika pengguna menekan tombol **Artists** pada navbar, pengguna akan dihadapkan dengan halaman tabel yang akan menampilkan daftar artist yang ada. Pengguna juga bisa menambahkan nama artist baru dengan mengisi field yang ada di sebelah kanan tabel. Pengguna bisa mengubah nama artist dengan menekan icon edit data, dan menghapus data artist dengan menekan icon tempat sampah.
4. Jika pengguna menekan tombol **Genres** pada navbar, pengguna akan dihadapkan dengan halaman tabel yang akan menampilkan daftar genre musik yang ada. Hal-hal yang bisa dilakukan pada halaman ini sama seperti yang bisa dilakukan pada halaman artist.
5. Pada halaman **Home**, pengguna bisa menekan album yang ada dan pengguna akan diarahkan ke halaman detail album yang dipilih. Pada halaman ini, pengguna bisa menghapus dan mengubah data album yang dipilih. Saat pengguna menekan tombol **Edit**, pengguna akan dihadapkan dengan halaman form agar pengguna bisa mengubah data album yang dipilih.

## Dokumentasi
https://github.com/anandamyzza/TP3DPBO2023C2/assets/100767177/c2ed3f8e-1bd0-4644-aa01-fb72f1918028

Screenshots ada pada folder yang sudah disediakan di repositori ini.
