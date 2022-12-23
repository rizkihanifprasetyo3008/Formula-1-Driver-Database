// ajax searching
// ambil elemen
let keyword = document.getElementById('keyword');
let tombolcari = document.getElementById('tombol-cari');
let container = document.getElementById('container');
let halaman_hilang = document.getElementById('halaman_hilang');

// tombolcari.addEventListener('click', function(){
//     alert("hai jing!!");
// })

keyword.addEventListener('keyup', function(){
    // buat object ajax
    let xhr = new XMLHttpRequest();
    // cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET','./ajax.php?keyword=' + keyword.value, true);
    xhr.send();
});