# studi-kasus-1-Cahyadesthian-156
studi-kasus-1-Cahyadesthian-156 created by GitHub Classroom                                                     
contoh:                                                   
<img src="https://user-images.githubusercontent.com/90148155/141651459-d52082a7-d7b0-4145-b3de-f6907cd8012d.png" width="300">
<img src="https://user-images.githubusercontent.com/90148155/141651465-6450ebf6-34da-4c92-8864-34f2bd5faa53.png" width="300">
<img src="https://user-images.githubusercontent.com/90148155/141651477-60e35f1b-462b-4394-ae04-dcde87c62d96.png" width="300">
## 📗 Mission 9 : Membuat repo melalui link dari discord kelas dan membuat tampilan responsive untuk halaman login.
🔽 Tampilan responsive halaman login                               

https://user-images.githubusercontent.com/90148155/141651421-47d77a6d-460f-4812-9d6c-7ab2fc753e3a.mp4

## 📗 Mission 10 : Membuat halaman responsive untuk halaman tabel dan grafik. 
🔽 Tampilan responsive halaman tabel               

https://user-images.githubusercontent.com/90148155/141651618-717bca8b-1144-4233-8156-1ba2dd6037a4.mp4                 
                                                                                                                     
🔽 Tampilan responsive halaman grafik                        

https://user-images.githubusercontent.com/90148155/141651649-b8b256af-f0cd-47ad-8c91-4cc4b0420e98.mp4                               
  
## 📗 Mission 11 : Membuat DB dan tabel di MySQL, isi dengan data dummy, melakukan koneksi dari PHP ke MySQL utk menampilkan data dari DB
🔽 Tabel yang dirancang beserta gambaran data :
![modeldatabase](https://user-images.githubusercontent.com/90148155/141651668-6b94e158-b13f-4717-834e-896b78266392.jpg)

Pada implementasi ini, setiap kejadian atau record yang ditampilkan pada halaman tabel, berkorelasi dengan **reason** dan **user** sehingga untuk menampilkan data pada halaman tabel dilakukan dengan query berikut 
```sql
SELECT KJD_ID, KJD_ON, KJD_OF, KJD_ACT, KJD_DIS, R_ID_KJD, USR_ID_KJD, R_DESC 
FROM kejadian INNER JOIN reason ON kejadian.R_ID_KJD = reason.R_ID 
WHERE USR_ID_KJD=$idLogged
ORDER BY KJD_ID"
```
hasil query berikut merupakan data-data yang berisi Id kejadian, waktu On, waktu Off, nama Act, nama Dis, Id Reason, Id User, dan Deskripsi dari Id Reason yang bersesuaian untuk ditampilkan pada halaman tabel.
Id dari user yang login didapat melalui global variable 
```php 
$_SESSION 
``` 
yang diproses saat user memasukkan username dan password dalam mekanisme login. Data tersebut juga digunakan untuk menghitung trend data reason dari Id User yang bersesuaian di halaman grafik
```php
$idLogin = $_SESSION["user_id"];
$yangLogin = query("SELECT * FROM user WHERE USR_ID = $idLogin");
```
kemudian untuk tiap datanya dilakukan perhitungan, misalnya untuk data 1
```php
$data1 = query("SELECT COUNT(KJD_ID) FROM kejadian WHERE USR_ID_KJD = $idLogin AND R_ID_KJD = 1");
$setData1 = $data1['COUNT(KJD_ID)'];
```
kemudian data tersebut digunakan untuk mengisi nilai pada Chart.js


## 📗 Mission 12 : Mengupload ke web hosting sehingga bisa diakses via internet
🔽 Website dapat diakses melalui https://studikasus1-pweb-kelas-e-2021-05111940000156.cahyadesthian.com/     
![webhosting](https://user-images.githubusercontent.com/90148155/141652154-a0fac7cb-22bb-4ae0-8dfc-a755125b7af0.jpg)


## 📗 Mission 13 : Mengimplementasikan session atau cookie, jika belum login maka jangan izinkan utk mengakses halaman tabel dan grafik, dan menerapkan fitur Logout. 
🔽 Pada implementasi ini digunakan fitur session. Dibawah ini adalah gambaran mengenai session dan logout

https://user-images.githubusercontent.com/90148155/141652099-dab0464c-9671-4f6b-a172-524d55f92266.mp4


## Beberapa hal lainnya diluar misi diatas yang diterapkan pada implementasi adalah sebagai berikut
## 📚 Fitur Tambah Data Kejadian
Penambahan data kejadian bersesuaian dengan id user yang sedang login

https://user-images.githubusercontent.com/90148155/141652319-96525f9d-5c2b-4343-bb0a-8373a6a546e2.mp4


## 📚 Fitur Cari Data Kejadian berdasarkan Act atau Dis
Pencarian data berdasarkan nama dari Act atau Dis

https://user-images.githubusercontent.com/90148155/141652340-200cabac-3884-4047-9506-0286dba4605e.mp4



## 📚 Fitur Edit Data Kejadian
Pengeditan Data kejadian dari id user yang sedang login dengan data kejadian yang bersesuaian, data yang dapat diubah adalah reason, nama Act, dan nama Dis


https://user-images.githubusercontent.com/90148155/141652374-7a494c73-8420-442e-be74-23002a755ca3.mp4



## 📚 Fitur Hapus Data Kejadian
Penghapusan data dari id user yang bersesuaian


https://user-images.githubusercontent.com/90148155/141652392-e2c83cc4-d6a4-4d16-9448-3fd2865b85cd.mp4


## 📚 Fitur Export Data menggunakan <a href="https://mpdf.github.io/">mpdf</a>
Export data pada halaman table menjadi pdf

https://user-images.githubusercontent.com/90148155/141652427-74b862ae-da0a-4576-82d6-b77de355a437.mp4

 
 
 
