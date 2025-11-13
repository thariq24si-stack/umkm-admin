 <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">thariq</a></p>
                </div>
                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                    <!-- List -->
                    {{--  <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/about">About</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/themes">Themes</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/blog">Blog</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/contact">Contact</a>
                        </li>
                    </ul>  --}}
                </div>
            </div>
        </footer>
       <a href="https://wa.me/6281290068741?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20program%20bantuan."
   class="float-whatsapp" target="_blank" title="Hubungi kami di WhatsApp">
    <img src="{{ asset('assets-admin/img/WhatsApp.png') }}" alt="WhatsApp" style="width:100%; height:100%; border-radius:50%;">
</a>

    <style>
     
.float-whatsapp {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    box-shadow: 2px 2px 3px #999;
    border-radius: 50%;
    overflow: hidden; /* supaya gambar tidak keluar dari lingkaran */
    z-index: 1000;
    transition: all 0.3s ease-in-out;
    background-color: #25d366; /* background hijau WA */
    display: flex;
    justify-content: center;
    align-items: center;
}

.float-whatsapp:hover {
    transform: scale(1.1);
}

.float-whatsapp img {
    width: 70%; /* ukuran gambar dalam tombol */
    height: 70%;
    object-fit: contain;
    border-radius: 0; /* logo biasanya kotak, jadi jangan dibulatkan */
    display: block;
}
    </style>

</footer>
