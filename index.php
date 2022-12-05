<?php
//array scalar (1 dimensi)
$m1 = ['NIM'=>'101190','Nama'=>'Agis','Nilai'=>100];
$m2 = ['NIM'=>'101191','Nama'=>'Detol','Nilai'=>55];
$m3 = ['NIM'=>'101192','Nama'=>'Fakih','Nilai'=>86];
$m4 = ['NIM'=>'101193','Nama'=>'Fajri','Nilai'=>70];
$m5 = ['NIM'=>'101194','Nama'=>'Andi','Nilai'=>80];
$m6 = ['NIM'=>'101195','Nama'=>'Yasin','Nilai'=>90];
$m7 = ['NIM'=>'101196','Nama'=>'Kholif','Nilai'=>70];
$m8 = ['NIM'=>'101197','Nama'=>'Afra','Nilai'=>65];
$m9 = ['NIM'=>'101198','Nama'=>'Andri','Nilai'=>80];
$m10 = ['NIM'=>'101199','Nama'=>'Zhafran','Nilai'=>100];

$ar_judul = ['No','NIM','Nama','Nilai','Keterangan',
'Grade','Predikat'];

//array assosiative (> 1 dimensi)
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

//aggregate function in array
$jumlah_siswa = count($mahasiswa);
$jml_nilai = array_column($mahasiswa,'Nilai');
$total_nilai = array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata2 = $total_nilai / $jumlah_siswa;
//keterangan
$keterangan0 = [
    'Jumlah Siswa'=>$jumlah_siswa,
    'Total Nilai'=>$total_nilai,
    'Nilai Tertinggi'=>$max_nilai,
    'Nilai Terendah'=>$min_nilai,
    'Rata - Rata Nilai'=>$rata2
];
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Belajar Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <h3 class="text-center">Daftar Nilai</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php
                    foreach($ar_judul as $jdl){
                    ?>
                    <th><?= $jdl ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($mahasiswa as $mhs){
                    // if grade
                    if ($mhs['Nilai'] >= 90){
                        $grade = 'A';
                    } elseif($mhs['Nilai'] >= 80){
                        $grade = 'B';
                    } elseif($mhs['Nilai'] >= 70){
                        $grade = 'C';
                    } elseif($mhs['Nilai'] >= 60){
                        $grade = 'D';
                    } elseif($mhs['Nilai'] < 60){
                        $grade = 'E';
                    };
                    

                    // if predikat
                    if ($grade == 'A'){
                        $predikat = "Memuaskan";
                    } elseif($grade == 'B'){
                        $predikat = "Baik";
                    } elseif($grade == 'C'){
                        $predikat = "Cukup";
                    } elseif($grade == 'D'){
                        $predikat = "Kurang";
                    } else {
                        $predikat = "Buruk";
                    };

                    // $keterangan =  ($mhs['Nilai'] >= 60) ? 'D' : ($mhs['Nilai'] >= 60) ? 'C' : 'E' ;
                    $keterangan =  ($mhs['Nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus' ;
                ?>
                
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs['NIM'] ?></td>
                    <td><?= $mhs['Nama'] ?></td>
                    <td><?= $mhs['Nilai'] ?></td>
                    <td><?= $keterangan ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
            <tfoot>
                <?php
                foreach ($keterangan0 as $ket => $hasil) {
                ?>
                <tr>
                    <th colspan="6"><?= $ket ?></th>
                    <th><?= $hasil ?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>

</html>